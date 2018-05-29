<style>
.publish-config-box h3 {
	font-size: 16px;
	padding: 10px 10px;
	margin: 0;
	line-height: 1;
}
.config-table {
	background-color:#FFFFFF;
	font-size:14px;
	padding:15px 20px;
}
.config-table td{
	height:35px;
	padding-left:10px;
}
.config-input {
	width:320px;
}
.info-box h3 {
	font-size: 15px;
	padding: 10px 10px;
	margin: 0;
	line-height: 1;
}
</style>
<?php
/**
保存处理
*/
$keydatas_password= 'keydatas.com';
$keydatas_title_unique=false;
$keydatas_tbk_link_enble=false;
$formSubmit = sanitize_text_field($_POST['formSubmit']);
if (isset($formSubmit) && $formSubmit != '') {
	if(check_admin_referer('keydatas_save_nonce') &&  current_user_can( 'manage_options' )){
		$keydatas_password = sanitize_text_field($_POST['keydatas_password']);
		$kds_title_unique = sanitize_text_field($_POST['keydatas_title_unique']);
		$keydatas_title_unique = isset($kds_title_unique) && $kds_title_unique=="true";
		$kds_tbk_link_enble = sanitize_text_field($_POST['keydatas_tbk_link_enble']);
		$keydatas_tbk_link_enble = isset($kds_tbk_link_enble) && $kds_tbk_link_enble=="true";
		update_option('keydatas_password', $keydatas_password);
		update_option('keydatas_title_unique', $keydatas_title_unique);
		update_option('keydatas_tbk_link_enble', $keydatas_tbk_link_enble);
		echo '<div id="message" class="updated fade"><p>保存成功</p></div>';
	}
}else{
    $keydatas_password = get_option('keydatas_password', $keydatas_password);
	$keydatas_title_unique = get_option('keydatas_title_unique', $keydatas_title_unique);
	$keydatas_tbk_link_enble = get_option('keydatas_tbk_link_enble', $keydatas_tbk_link_enble);
}
?>
<div class="wrap">
  <h2>简数数据采集平台</h2>
  <br/>
    <div class="publish-config-box">
      <h3>内容发布设置</h3>
      <div>
<form id="configForm" method="post" action="admin.php?page=keydatas/publish-setting.php">	  
        <table width="100%" class="config-table">
          <tr>
            <td width="15%">网站发布地址为:</td>
            <td><input type="text" id="homeUrl"  name="homeUrl" class="config-input" readonly value="<?php
                                if (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on") {
                                    echo "https://";
                                } else {
                                    echo "http://";
                                }
                                $domain = str_replace('\\', '/', $_SERVER['HTTP_HOST'] . str_replace('/wp-admin', '', dirname($_SERVER['SCRIPT_NAME'])));
                                echo $domain; ?>" />
            
            </td>
          </tr>
          <tr>
            <td>发布密码:</td>
            <td><input type="text" name="keydatas_password" class="config-input" value="<?php echo $keydatas_password; ?>" />（请注意修改并保管好）
            </td>
          </tr>
		  <tr>
			<td>根据标题去重:</td>
			<td><input type="checkbox" name="keydatas_title_unique" value="true" <?php if($keydatas_title_unique == true) echo "checked='checked'" ?> />存在相同标题，则不插入
			</td>
		</tr>
		  <tr>
			<td>淘宝客插件支持:</td>
			<td><input type="checkbox" name="keydatas_tbk_link_enble" value="true" <?php if($keydatas_tbk_link_enble == true) echo "checked='checked'" ?> />保存商品链接/推广链接到自定义栏目<code>tbk_link</code> （需要安装 <a href="https://wptao.com/wptao.html?affid=9034" target="_blank">WordPress淘宝客插件</a>）
			</td>
		</tr>					  
          <tr>
            <td><input type="submit"  name="formSubmit"  value="保存更改" class="button-primary" /></td>
            <td></td>
          </tr>
        </table>
    <?php
        wp_nonce_field('keydatas_save_nonce');
    ?>		
  </form>		
      </div>
    </div>
  <div class="info-box">
    <h3>简数数据采集平台使用</h3>
    <div>
      <table width="100%" class="config-table">
        <tr>
          <td width="15%">简数数据采集平台官网:</td>
          <td><a href="http://www.keydatas.com" target="_blank">www.keydatas.com</a></td>
        </tr>		
        <tr>
          <td>采集发布教程：</td>
          <td><a href="http://www.keydatas.com/publish/wordpress.html" target="_blank">WordPress采集发布使用教程</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>