<?php
		
	function getBaseDomain($url=''){
        if(!$url){
            return $url;
        }
        #列举域名中固定元素
        $state_domain = array(
            'al','dz','af','ar','ae','aw','om','az','eg','et','ie','ee','ad','ao','ai','ag','at','au','mo','bb','pg','bs','pk','py','ps','bh','pa','br','by','bm','bg','mp','bj','be','is','pr','ba','pl','bo','bz','bw','bt','bf','bi','bv','kp','gq','dk','de','tl','tp','tg','dm','do','ru','ec','er','fr','fo','pf','gf','tf','va','ph','fj','fi','cv','fk','gm','cg','cd','co','cr','gg','gd','gl','ge','cu','gp','gu','gy','kz','ht','kr','nl','an','hm','hn','ki','dj','kg','gn','gw','ca','gh','ga','kh','cz','zw','cm','qa','ky','km','ci','kw','cc','hr','ke','ck','lv','ls','la','lb','lt','lr','ly','li','re','lu','rw','ro','mg','im','mv','mt','mw','my','ml','mk','mh','mq','yt','mu','mr','us','um','as','vi','mn','ms','bd','pe','fm','mm','md','ma','mc','mz','mx','nr','np','ni','ne','ng','nu','no','nf','na','za','aq','gs','eu','pw','pn','pt','jp','se','ch','sv','ws','yu','sl','sn','cy','sc','sa','cx','st','sh','kn','lc','sm','pm','vc','lk','sk','si','sj','sz','sd','sr','sb','so','tj','tw','th','tz','to','tc','tt','tn','tv','tr','tm','tk','wf','vu','gt','ve','bn','ug','ua','uy','uz','es','eh','gr','hk','sg','nc','nz','hu','sy','jm','am','ac','ye','iq','ir','il','it','in','id','uk','vg','io','jo','vn','zm','je','td','gi','cl','cf','cn','yr','com','arpa','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','me','mobi','asia','ax','bl','bq','cat','cw','gb','jobs','mf','rs','su','sx','tel','travel'
        );

        if(!preg_match("/^http/is", $url)){
            $url="http://".$url;
        }

        $res = array();
        // $res->domain = null;
        // $res->host = null;
        $url_parse = parse_url(strtolower($url));
        $urlarr = explode(".", $url_parse['host']);
        $count = count($urlarr);
        // echo $url;
        if($count <= 2){
            #当域名直接根形式不存在host部分直接输出
            $res['domain'] = $url_parse['host'];
        }elseif($count > 2){
            $last = array_pop($urlarr);
            $last_1 = array_pop($urlarr);
            $last_2 = array_pop($urlarr);

            $res['domain'] = $last_1.'.'.$last;
            $res['host'] = $last_2;

            if(in_array($last, $state_domain)){
                $res['domain']=$last_1.'.'.$last;
                $res['host']=implode('.', $urlarr);
            }

            if(in_array($last_1, $state_domain)){
                $res['domain'] = $last_2.'.'.$last_1.'.'.$last;
                $res['host'] = implode('.', $urlarr);
            }
            #print_r(get_defined_vars());die;
        }
        return $res['domain'];
}

