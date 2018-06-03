<?php
return array(
    'URL_ROUTER_ON'         =>  true,                           // 开启路由
    'URL_ROUTE_RULES'       =>  array(                          // 路由规则
        'admin/login'       => 'admin/Index/index',
        'category/:tid\d'=> 'Index/category',                   //分类规则
        'label/:lid\d'=> 'Index/0label',                    // 标签规则
        'article/:aid\d'=> 'Index/article',                    // 标签规则
        'search'=>'Index/search',
        'knowledge/:kid\d'=>'Knowledge/One', 
        '/error/'=>'Public/error'              //小知识详情规则
    ),
//*********************************附加设置***********************************
//    'TAGLIB_BUILD_IN'       =>  'Cx,Common\Tag\My',           //加载自定义标签
    'LOAD_EXT_CONFIG'       =>  'webconfig,db,oauth',         //加载网站设置文件
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
    'MODULE_ALLOW_LIST'     =>  array('Home','Admin','Api'),  //允许访问列表
    'TMPL_EXCEPTION_FILE'   =>  APP_DEBUG ? THINK_PATH.'Tpl/think_exception.tpl' : './Template/default/Home/Public/error.html',                                    //404设置
//***********************************URL*************************************
    'URL_MODEL'             =>  1,                            // 为了兼容性更好而设置成1 如果确认服务器开启了mod_rewrite 请设置为 2
    'URL_CASE_INSENSITIVE'  =>  false,                        // 区分url大小写
    'VIEW_PATH' => TMPL_PATH,
    'TMPL_L_DELIM' => '<{', // 模板引擎普通标签开始标记
	'TMPL_R_DELIM' => '}>', // 模板引擎普通标签结束标记
);
