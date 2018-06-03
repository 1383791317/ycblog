<?php
return array(
//*************************************网站设置****************************************
    'WEB_STATUS'                =>  '1',           //网站状态1:开启 0:关闭
    'WEB_CLOSE_WORD'            =>  '网站升级中，请稍后访问。',       //网站关闭时提示文字
    'WEB_ICP_NUMBER'            =>  '豫ICP备17044556号-1',       // 网站ICP备案号
    'ADMIN_EMAIL'               =>  'yc_1224@163.com',          // 站长邮箱
    'WEB_K_ARR'                 =>array(
       'name'=>'小笔记',
       'css_name'=>'icon-signal'
    ),
    //*************************************优化推广****************************************
    'WEB_NAME'                  =>  'YC博客',             //网站名：
    'WEB_KEYWORDS'              =>  '杨超,YC,小北,技术博客,个人博客,ycblog',         //网站关键字
    'WEB_DESCRIPTION'           =>  '小北的个人技术博客,bjyblog官方网站',      //网站描述
    'COPYRIGHT_WORD'            =>  '本文为小北学习总结,转载无需和我联系,但请注明来自ycblog.com.cn',       //文章保留版权提示

//*************************************第三方登录****************************************
    'QQ_APP_ID'                 =>  '101443168',            // QQ登录APP D
    'QQ_APP_KEY'                =>  '5143e552ed17efc9ddb59cbc8809bed8',           // QQ登录APP KEY
//    'SINA_API_KEY'              =>  '',         // 新浪登录API KEY
//    'SINA_SECRET'               =>  '',          // 新浪登录SECRET
//    'DOUBAN_API_KEY'            =>  '',       // 豆瓣登录API KEY
//    'DOUBAN_SECRET'             =>  '',        // 豆瓣登录SECRET
//    'RENREN_API_KEY'            =>  '',       // 人人登录API KEY
//    'RENREN_SECRET'             =>  '',        // 人人登录SECRET
//    'KAIXIN_API_KEY'            =>  '',       // 开心网登录API KEY
//    'KAIXIN_SECRET'             =>  '',        // 开心网登录SECRET
//    'GITHUB_CLIENT_ID'          =>  '',     // github登录API KEY
//    'GITHUB_CLIENT_SECRET'      =>  '', // github登录SECRET
//    'SOHU_API_KEY'              =>  '',         // 搜狐网登录API KEY
//    'SOHU_SECRET'               =>  '',          // 搜狐网登录SECRT
//***********************************其他第三方接口****************************************
//    'WEB_STATISTICS'            =>  '',       // 第三方统计代码
//    'BAIDU_SITE_URL'            =>  '',       // 百度推送site提交接
//***********************************邮箱设置***********************************************
//    'EMAIL_SMTP'                =>  '',           //  SMTP服务器
//    'EMAIL_USERNAME'            =>  '',       //  邮箱用户名
//    'EMAIL_PASSWORD'            =>  '',       //  邮箱密码
//    'EMAIL_FROM_NAME'           =>  '',      //  发件名
//***********************************评论管理***********************************************
//    'COMMENT_REVIEW'            =>  '1',       // 评论审核1:开启 0:关闭
//    'COMMENT_SEND_EMAIL'        =>  '0',   // 被评论邮件通知1:开启 0:关闭
//    'EMAIL_RECEIVE'             =>  '',        // 接收评论通知邮箱
//******************************上传图片***********************************
    'UPLOAD_IMG_URL'        =>'/Upload/article_img',//书写格式    /xxxx/xxx/xxx
    'DEFAULT_IMG_URL'       =>'/Public/image/qrcode_for_gh_faded6233382_258.jpg'

);