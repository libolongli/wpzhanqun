<?php
/*
Plugin Name: 简数数据采集发布插件
Plugin URI: http://www.keydatas.com/wordpress-plugin
Description: 简数(keydatas.com)数据采集平台是一个完全在线配置和云端采集的网页数据采集和发布平台，它功能强大，操作简单，不仅提供网页内容采集、数据二次处理和发布等数据采集基本功能，还创新实现了智能提取引擎以及书签一键采集发布等特色功能等待;并支持微信公众号文章采集。
Version: 2.1.2
Author: keydatas
Author URI: http://www.keydatas.com
License: GPLv2 or later
Text Domain: keydatas
*/
function keydatas_mergeRequest() {
    if (isset($_GET['callback'])) {
        $_REQ  = array_merge($_GET, $_POST);
    } else {
        $_REQ  = $_POST;
    }
    return $_REQ ;
}


function keydatas_successRsp($data = "", $msg = "") {
    keydatas_rsp(1,0, $data, $msg);
}

function keydatas_failRsp($code = 0, $data = "", $msg = "") {
    keydatas_rsp(0,$code, $data, $msg);
}

function keydatas_rsp($result = 1,$code = 0, $data = "", $msg = "") {
	die(json_encode(array("rs" => $result, "code" => $code, "data" => $data, "msg" => urlencode($msg))));
}
function keydatas_genRandomIp(){
	$randIP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
	return $randIP;
}

if(function_exists('date_default_timezone_set')){
    date_default_timezone_set('PRC');
}else{
    ini_set('date.timezone','Asia/Shanghai');
}
if (is_admin()) {
   //将函数连接到添加菜单
    add_action('admin_menu', 'keydatas_add_menu');
}

//在后台管理界面添加菜单
function keydatas_add_menu() {
    if (function_exists('add_menu_page')) {
        add_menu_page('简数采集平台', '简数采集平台', 'administrator', 'keydatas/publish-setting.php', '', plugins_url( 'keydatas/images/icon.png' ));
    }
}
add_action('init', 'keydatas_post_doc');
function keydatas_myplugin_activate() {
}
// 寄存一个插件函数，该插件函数在插件被激活时运行
register_activation_hook(__FILE__, 'keydatas_myplugin_activate');

function keydatas_post_doc() {
    global $wpdb;
	if (isset($_GET["__kds_flag"])){
		$_REQ = keydatas_mergeRequest();
		$kds_password = get_option('keydatas_password', "keydatas.com");
		if (empty($_REQ['kds_password']) || $_REQ['kds_password'] != $kds_password) {
			keydatas_failRsp(1403, "password error", "提交的发布密码错误");
		}	
	}

	if (isset($_GET["__kds_flag"])){
		ini_set("display_errors", "On");
        error_reporting(E_ERROR | E_PARSE);
			
		if ($_GET["__kds_flag"] == "post") {		
			$title = $_REQ["post_title"];
			if (empty($title)) {
				keydatas_failRsp(1404, "title is empty", "标题不能为空");
			}			
			$content = $_REQ["post_content"];
			//文章摘要
			$excerpt = $_REQ["post_excerpt"];
			//文章类型
			$postType = $_REQ["post_type"];
			$postStatus = 'publish';
			if (isset($_REQ["post_status"]) && in_array($_REQ["post_status"], array('publish', 'draft'))) {
				$postStatus = $_REQ["post_status"];
			}
			//closed
			$commentStatus = 'open';
			if (isset($_REQ["comment_status"]) && in_array($_REQ["comment_status"], array('open', 'closed'))) {
				$commentStatus = $_REQ["comment_status"];
			}
			//文章密码,文章编辑才可为文章设定一个密码，凭这个密码才能对文章进行重新强加或修改
			$postPassword = '';
			if (isset($_REQ["post_password "]) && $_REQ["post_password "]) {
				$postPassword = $_REQ["post_password "];
			}

			$my_post = array(
				'post_password' => $postPassword,
				'post_status' => $postStatus,
				'comment_status' => $commentStatus,
				'post_author' => 1
			);
			if (!empty($title)) {
				$my_post['post_title'] = htmlspecialchars_decode($title);
			}
			if (!empty($content)) {
				$my_post['post_content'] = $content;
			}
			if(!empty($excerpt)){
				$my_post['post_excerpt'] = htmlspecialchars_decode($excerpt);
			}
			if(!empty($postType)){
				$my_post['post_type'] = $postType;
			}
			
			
			//标题唯一校验
            $title_unique = get_option('keydatas_title_unique', false);
			if($title_unique){
                $post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_title='%s' and post_status!='trash' and post_status!='inherit' ",$my_post['post_title']));
                if(!empty($post)){
					//返回访问路径
                    keydatas_successRsp(array("url" => get_home_url() . "/?p={$post->ID}"));
                }
            }

			$post_date = intval($_REQ["post_date"]);
			if (!empty($post_date)) {
				$my_post['post_date'] = date("Y-m-d H:i:s", $post_date);
			} else {
				$my_post['post_date'] = date("Y-m-d H:i:s", time());
			}

			$author = htmlspecialchars_decode($_REQ["post_author"]);

			if (!empty($author)) {
				if($author == "rand_users"){
					$user_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users order by rand() limit 1"));
				}else{
					//用户名（登录名）					
					$user_id = username_exists($author);
				}
				if (!$user_id) {
					$md5author = substr(md5($author), 8, 16);
					$random_password = wp_generate_password();
					$userdata = array(
						'user_login' => $md5author,
						'user_pass' => $random_password,
						'display_name' => $author,
					);
					$user_id = wp_insert_user($userdata);
					if (is_wp_error($user_id)) {
						$user_id = 0;
					}
				}
				if ($user_id) {
					$my_post['post_author'] = $user_id;
				}
			}
			//分类目录
			$category = $_REQ["post_category"];
			if (!empty($category)) {
				$cates = explode(',',$category);
				if (is_array($cates)) {
					$post_cates = array();
					$term = null;
					foreach ($cates as $cate) {
						$term = term_exists($cate, "category");
						if ($term === 0 || $term === null) {
							$term = wp_insert_term($cate, "category");
						}						
						if ($term !== 0 && $term !== null && !is_wp_error($term)) {
							array_push($post_cates, intval($term["term_id"]));
						}
					}
					if (count($post_cates) > 0) {
						$my_post['post_category'] = $post_cates;
					}
				}
			}

			$post_tag = $_REQ["post_tag"];
			if (!empty($post_tag)) {
				$tags = explode(',',$post_tag);
				if (is_array($tags)) {
					$post_tags = array();
					$term = null;
					foreach ($tags as $tag) {
						$term = term_exists($tag, "post_tag");
						if ($term === 0 || $term === null) {
							$term = wp_insert_term($tag, "post_tag");
						}
						if ($term !== 0 && $term !== null && !is_wp_error($term)) {
							array_push($post_tags, intval($term["term_id"]));
						}
					}
					if (count($post_tags) > 0) {
						$my_post['tags_input'] = $post_tags;
					}
				}
			}
			
			kses_remove_filters();
			$post_id = wp_insert_post($my_post);
			kses_init_filters();

			if (empty($post_id) || is_wp_error($post_id)) {
				keydatas_failRsp(1500, "post_id is Empty", "插入文章失败");
			}
			//缩略图处理
			$image_url = $_REQ["post_thumbnail"];
			if (!empty($post_id) && !empty($image_url)) {
					$image_url_final=$image_url;
					
					if (substr($image_url, 0, 2) ==="//") {
						$image_url_final='http:'.$image_url;
					}else if(strpos($image_url, '/') === 0) {
						$image_url_final=get_home_url().$image_url;
					}	
					$upload_dir = wp_upload_dir();
					$image_data = file_get_contents($image_url_final);
					$suffix = "jpg";
					$filename = md5($image_url_final) . "." . $suffix;
					if (wp_mkdir_p($upload_dir['path'])) {
						$file = $upload_dir['path'] . '/' . $filename;
					} else {
						$file = $upload_dir['basedir'] . '/' . $filename;
					}

					file_put_contents($file, $image_data);
					if (file_exists($file)) {
						//error_log('file_exists:'.$filename, 3, '/var/log/wp_test.log');
						$wp_filetype = wp_check_filetype($filename, null);
						$attachment = array(
							'post_mime_type' => $wp_filetype['type'],
							'post_title' => sanitize_file_name($filename),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						// attachment相关
						$attach_id = wp_insert_attachment($attachment, $file, $post_id);
						require_once(ABSPATH . 'wp-admin/includes/image.php');
						$attach_data = wp_generate_attachment_metadata($attach_id, $file);
						wp_update_attachment_metadata($attach_id, $attach_data);
						set_post_thumbnail($post_id, $attach_id);
					}
			}
			//deal meta for tbk淘宝客
			$keydatas_tbk_link_enble = get_option('keydatas_tbk_link_enble', false);
			if($keydatas_tbk_link_enble){
				$tbk_link = $_REQ["tbk_link"];
				if (!empty($tbk_link)) {
					add_post_meta($post_id, 'tbk_link', $tbk_link, true);
				}
			}
			//其它meta数据处理
			if (!empty($post_id)) {
				foreach ($_REQ as $key => $value) { 
					if (strpos($key, '__kdsExt_') === 0) {
						$real_name=substr($key,9);
						if (!empty($real_name)) {
							add_post_meta($post_id, $real_name, $value, true);
						}
					}
				}  
			}			
			keydatas_successRsp(array("url" => get_home_url() . "/?p=" . $post_id));
		} else if ($_GET["__kds_flag"] == "category") {
			//获取分类目录
			$ret = array();
			if ($_REQ["type"] === "cate") {
				$cates = get_terms('category', 'orderby=count&hide_empty=0');
				foreach ($cates as $cate) {
					array_push($ret, array("value" => urlencode($cate->name), "text" => urlencode($cate->name)));
				}
			}
			keydatas_successRsp($ret);
		} else if ($_GET["__kds_flag"] == "version") {
			//获取用户使用的Php和Wp版本信息
			global $wp_version;
			$versions = array(
				'php' => PHP_VERSION,
				'plugin' => '1.0',
				'wp' => $wp_version,
			);
			keydatas_successRsp($versions);
		}
	}
}
?>