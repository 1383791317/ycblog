<?php

return array(
    'URL_ROUTER_ON'         =>  true,                           // 开启路由
    'URL_ROUTE_RULES'       =>  array(                          // 路由规则
        'category/:tid\d'=> 'Index/category',                   //分类规则
        'label/:lid\d'=> 'Index/label',                    // 标签规则
        'article/:aid\d'=> 'Index/article',                    // 标签规则
        'search'=>'Index/search',
        'knowledge/:kid\d'=>'Knowledge/One',               //小知识详情规则
            // 分类路由
//        'article/:aid\d'=>'Index/article',                      // 文章路由
//        'chat'=>'Index/chat',                                   // 随言碎语路由
//        'git'=>'Index/git',                                     // 开源项目路由
    ),
);
