<?php
return array(

//*********************************附加设置***********************************
//    'TAGLIB_BUILD_IN'       =>  'Cx,Common\Tag\My',           //加载自定义标签
    'LOAD_EXT_CONFIG'       =>  'webconfig,db',         //加载网站设置文件
    'TMPL_PARSE_STRING'     =>  array(                        //定义常用路径
        '__HOME_CSS__'      =>  __ROOT__.trim(TMPL_PATH,'.').'Home/Public/css',
        '__HOME_JS__'       =>  __ROOT__.trim(TMPL_PATH,'.').'Home/Public/js',
        '__HOME_FONT__'       =>  __ROOT__.trim(TMPL_PATH,'.').'Home/Public/font',
        '__HOME_MUSIC__'     =>__ROOT__.trim(TMPL_PATH,'.').'Home/Public/music',
        '__HOME_IMG__'    =>  __ROOT__.trim(TMPL_PATH,'.').'Home/Public/img',
        '__ADMIN_LIB__'     =>  __ROOT__.trim(TMPL_PATH,'.').'Admin/Public/lib',
        '__ADMIN_STATIC__'      =>  __ROOT__.trim(TMPL_PATH,'.').'Admin/Public/static',
        '__ADMIN_TEMP__'   =>  __ROOT__.trim(TMPL_PATH,'.').'Admin/Public/temp',
    ),
//***********************************URL设置*********************************
    'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),  //允许访问列表
    'TMPL_EXCEPTION_FILE'   =>  APP_DEBUG ? THINK_PATH.'Tpl/think_exception.tpl' : './Template/default/Home/Public/404.html',                                    //404设置
//***********************************SESSION设置*****************************
//    'SESSION_OPTIONS'       =>  array(
//        'name'              =>  'BJYSESSION',                 //设置session名
//        'expire'            =>  24*3600*15,                   //SESSION保存15天
//        'use_trans_sid'     =>  1,                            //跨页传递
//        'use_only_cookies'  =>  0,                            //是否只开启基于cookies的session的会话方式
//    ),
//***********************************URL*************************************
    'URL_MODEL'             =>  3,                            // 为了兼容性更好而设置成1 如果确认服务器开启了mod_rewrite 请设置为 2
    'URL_CASE_INSENSITIVE'  =>  true,                        // 区分url大小写
    'VIEW_PATH' => TMPL_PATH,
    'TMPL_L_DELIM' => '<{', // 模板引擎普通标签开始标记
	'TMPL_R_DELIM' => '}>', // 模板引擎普通标签结束标记
    //*******************************成功失败跳转页***************************
//    'TMPL_ACTION_ERROR'     =>  'Public:success', // 默认错误跳转对应的模板文件
//    'TMPL_ACTION_SUCCESS'   =>  'Public:success', // 默认成功跳转对应的模板文件
);
