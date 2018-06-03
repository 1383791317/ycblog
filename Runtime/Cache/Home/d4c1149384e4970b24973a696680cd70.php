<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<title><?php if($tname["name"] != ''): echo ($article["title"]); ?>-<?php endif; if($article["title"] != ''): echo ($article["title"]); ?>-<?php endif; if($knowledge["title"] != ''): echo ($article["title"]); ?>-<?php endif; echo (C("WEB_NAME")); ?></title>
<meta name="keywords" content="<?php echo ($article["keywords"]); ?>"/>
<meta name="description" content="<?php echo ($article["description"]); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link href="/Template/default/Home/Public/css/bootstrap.min.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/bootstrap-responsive.min.css" rel="stylesheet" />

<link href="/Template/default/Home/Public/css/font-awesome.css" rel="stylesheet" />

<link href="/Template/default/Home/Public/css/adminia.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/adminia-responsive.css" rel="stylesheet" />

<link href="/Template/default/Home/Public/css/pages/dashboard.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/my.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/audio.css">

<script src="/Template/default/Home/Public/js/baidu_js_push.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/js/emoji/jquery.sinaEmotion.css">
    <script src="/Template/default/Home/Public/js/emoji/jquery.min.js"></script>
    <style>
        @media only screen and (min-width: 100px) and (max-width: 600px) {
            .my_css_content{width: 300px;overflow: hidden;}
        }
        @media only screen and (min-width: 600px) and (max-width: 900px) {
            .my_css_content{width: 450px;overflow: hidden;}
    
        }
        @media only screen and (min-width: 1000px) and (max-width: 1200px) {
            .my_css_content{width: 600px;overflow: hidden;}
            
        }
    </style>
</head>

<body>

<div class="navbar navbar-fixed-top">

    <div class="navbar-inner">

        <div class="container">

            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="./">YC BLOG</a>

            <div class="nav-collapse">

                <ul class="nav pull-right">
                        <li><a href="/" onclick="recordId('/',0)">首页</a></li>
                   <?php if(is_array($articleType)): $i = 0; $__LIST__ = $articleType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Index/category/tid/<?php echo ($v["tid"]); ?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="divider-vertical"></li>
                    <?php if($_SESSION['ycblogyangchaouserinfo']== ''): ?><li class="dropdown">

                            <p data-toggle="dropdown" class="dropdown-toggle">
                                登录 <b class ="caret"></b>
                            </p>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo U('Home/User/oauth_login',array('type'=>qq));?>"> <img src="/Template/default/Home/Public/img/qq.png" width="20px"/> QQ  </a>
                                </li>

                                <li>
                                    <a href="<?php echo U('Home/User/login');?>"><img src="/Template/default/Home/Public/img/weibo.png" width="20px"/></i> 微博</a>
                                </li>
                                <li>
                                    <a href=""> <img src="/Template/default/Home/Public/img/zhanghao.png" width="20px"/>  账号 </a>
                                </li>
                                <li class="divider"></li>

                                <li>
                                    <a href="./"><a href="./account.html"> <img src="/Template/default/Home/Public/img/zhuce.png" width="20px" style="margin-bottom: 5px"/>  注册 </a></a>
                                </li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li>
                        <?php else: ?>
                        <li class="dropdown">

                            <p data-toggle="dropdown" class="dropdown-toggle">
                                Rod Howard <b class ="caret"></b>
                            </p>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="./account.html"><i class="icon-user"></i> Account Setting  </a>
                                </li>

                                <li>
                                    <a href="./change_password.html"><i class="icon-lock"></i> Change Password</a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="./"><i class="icon-off"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li><?php endif; ?>
                    <li>
                        <form class="search_form_title" action="/index.php/Home/Index/search" method="get">
                        <input class="search_whole_title" value="" name="keywords" placeholder="全站搜索">
                        <input type="submit" class="search_button_title" value="GO"/>
                        </form></li>
                </ul>

            </div> <!-- /nav-collapse -->

        </div> <!-- /container -->

    </div> <!-- /navbar-inner -->

</div> <!-- /navbar -->

<div id="content">
<div class="container">
    <div class="row">
        <div class="span8">
            <div class="row">
                <div class="span8">
                     <div class="widget-content">
                            <h2 style="text-align: center">
                                <?php echo ($article["title"]); ?>
                            </h2>
                            <ul class="my_css_title my_css_title_article">
                                <li><i class="icon-th-list"></i><?php echo ($article["author"]); ?>
                                </li>
                                <li>
                                    <i class="icon-th-list"></i><a><?php echo ($article["add_time"]); ?></a>
                                </li>
                                <li>
                                    <i class="icon-th-list"></i><a><?php echo ($article["name"]); ?></a>
                                </li>
                                <li>
                                    <i class="icon-th-list"></i><a><?php if(is_array($libs)): $i = 0; $__LIST__ = $libs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; echo ($v["name"]); ?>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?></a>
                                </li>
                            </ul>
                            <div class="hr_title_bottom">   <hr/></div>

                            <div class="my_css_content">
                                 <?php echo ($article["content"]); ?>
                                <div class="content_footer">
                                    <p><b>上一篇：</b><?php if($prev["title"] == ''): ?><i style="color: #61CAD0">没有啦&nbsp;~\(≧▽≦)/~</i><?php else: ?><a href="/index.php/Home/Index/article/aid/<?php echo ($prev["id"]); ?>"><?php echo ($prev["title"]); ?></a><?php endif; ?></p>
                                    <p><b>下一篇：</b><?php if($next["title"] == ''): ?><i style="color: #61CAD0">没有啦&nbsp;~\(≧▽≦)/~</i><?php else: ?><a href="/index.php/Home/Index/article/aid/<?php echo ($next["id"]); ?>"><?php echo ($next["title"]); ?></a><?php endif; ?></p>
                                </div>
                                <br/>
                                <p style="text-align: center"><?php echo (C("COPYRIGHT_WORD")); ?></p>
                            </div>

                            <!-- 畅言评论 -->
                            <div class="my-commont">
                                <textarea class="commont-input"  onfocus="changeInner(this)"><?php echo (C("WEB_NAME")); ?></textarea>
                                <div class="boottom-face">
                                    <img src="/Template/default/Home/Public/img/face.png" onclick="changeFace(this)">
                                </div>
                                <div class="bottom-a">
                                        <a href="javascript:;" onclick="publish(this)">评论</a>
                                </div>
                            </div>
                            <div class="newest-commont">
                                <span>评论</span>
                            </div>
                            <?php if($a == ''): ?><div class="commont-content repalyVaule">
                                    <div class="commont-content-left"><img src="/Template/default/Home/Public/img/music_img/cover5.jpg"></div>
                                    <div class="commont-content-right">

                                        <div class="commont-user repalyItFather">
                                            <p><span>评论用户名</span><span class="commont-time">2018年4月5号</span></p>
                                             <p>评论内容 <span class="commont-reply" onclick="repalyIt(this)">回复</span></p> 
                                        </div>
                                    </div>
                                </div>
                                <div class="commont-user-user repalyItFather repalyVaule">

                                            2018年4月6号&nbsp;&nbsp; <span>柱子</span> &nbsp;&nbsp;<b>回复了</b>&nbsp;&nbsp;<span>黄磊</span>：水电费是否对 <span class="commont-reply" onclick="repalyIt(this)">回复</span></p>
                                </div>
                                <?php else: ?>
                                <div class="commont-content-null">
                                    暂无品论,快来占个楼!
                                </div><?php endif; ?>
                    </div> <!-- /widget -->
                </div>
            </div> <!-- /row -->
        </div>
      <script>
 function logout(){
    $.ajax({
      url:'./index.php/Home/User/logout',
      type:'post',
      success:function(){
        $('.account-container').css('display','none');
      },
      error:function(){
        alert('退出失败')
      }
    })
   }

</script>
<div class="span3">

    <form class="search_form" action="<?php echo U('Home/Index/search');?>" method="get">
        <input class="search_whole" value="" name="keywords" placeholder="全站搜索">
        <input type="submit" class="search_button" value="GO"/>
    </form>

    <?php if($_SESSION['ycblog1224userinfo']!= ''): ?><div class="account-container">

           <div class="account-avatar">
               <img src="<?php echo ($_SESSION['ycblog1224userinfo']['head_img']); ?>" alt="" class="thumbnail" />
           </div> <!-- /account-avatar -->

           <div class="account-details">

               <span class="account-name"><?php echo ($_SESSION['ycblog1224userinfo']['user_name']); ?></span>

               <span class="account-role">登录次数: <?php echo ($_SESSION['ycblog1224userinfo']['login_times']); ?> 次</span>

               <span class="account-actions">
							<a href="javascript:;" onclick="logout()">退出</a>
						</span>

           </div> <!-- /account-details -->
       </div> <!-- /account-container -->
 <hr /><?php endif; ?>

    <ul id="main-nav" class="nav nav-tabs nav-stacked">

        <li class="active">
            <a href="/">
                <i class="icon-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;首页
            </a>
        </li>
        <?php if(is_array($articleType)): $i = 0; $__LIST__ = $articleType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
            <a href="<?php echo U('Home/Index/category',array('tid'=>$v['tid']));?>">
                    <i class="<?php echo (selectlogo($v["logo_id"],$v.logo_id)); ?>"></i>
                <?php echo ($v["name"]); ?>
            </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <li>
            <a href="<?php echo U('Home/Knowledge/index');?>" style="font-size: 14px;">
                <img src="/Template/default/Home/Public/img/zhishi.png" width="20px;" >&nbsp; <?php echo (C("WEB_K_ARR.name")); ?>

            </a>
        </li>
        <?php if($_SESSION['ycblogyangchaouserinfo']!= ''): ?><li>
                <a href="./faq.html">
                    <i class="icon-user"></i>个人信息

                </a>
            </li><?php endif; ?>
    </ul>

    <hr />


    <div class="widget">

            <div class="widget-header">
                <h3>热门标签</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
                    <?php if(is_array($articleLabel)): $i = 0; $__LIST__ = $articleLabel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Index/label',array('lid'=>$v['lid']));?>" class="badge badge-warning colorRandom" style="line-height: 20px;margin: 3px 0 9px;" ><?php echo ($v["name"]); ?></a>
                       &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <div class="widget">

            <div class="widget-header">
                <h3>微信公众号</h3>
            </div> <!-- /widget-header -->

            <div class="img-content">
                <img src="/Public/image/qrcode_for_gh_faded6233382_258.jpg">
            </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <div class="widget">

        <div class="widget-header">
            <h3>友情链接</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">
           <ul class="link_content">
               <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><i class="icon-magnet"></i><a href="" onclick="window.open('<?php echo ($v["url"]); ?>','_blank')"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
           </ul>
        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
    <br />
</div> <!-- /span3 -->
<script src="/Template/default/Home/Public/js/jquery-1.7.2.min.js"></script>
<script>
    function getRandomColor(){
        var rgb='rgb('+Math.floor(Math.random()*255)+','
            +Math.floor(Math.random()*255)+','
            +Math.floor(Math.random()*255)+')';
        return rgb;
    }
    var arr=[];
    var obj= $(".colorRandom");
    for (var i =0 ; i< obj.length; i++){
        arr.push(getRandomColor());
        for (var j= 0; j<arr.length;j++){
            $(obj[i]).css("backgroundColor",arr[j]);
        }
    }
</script>

    </div>
</div>
</div>


<div id="footer">

    <div class="container">
        <hr />
        <p style="text-align: center">Copyright © 2017 <a href="http://www.ycblog.com.cn">www.yclog.com.cn</a> &nbsp;&nbsp;|&nbsp;&nbsp;<?php echo (C("WEB_ICP_NUMBER")); ?></p>
        <p style="text-align: center">联系邮箱：<?php echo (C("ADMIN_EMAIL")); ?></p>
    </div> <!-- /container -->

</div> <!-- /footer -->
 <script src="/Template/default/Home/Public/js/emoji/jquery.sinaEmotion.js"></script>
 <script type="/Template/default/Home/Public/js/emoji/jquery-sinaEmotion-2.1.0.min.js"></script>   
<script type="text/javascript"> 
        function changeFace(e){
             if(! $('#sinaEmotion').is(':visible')){
                    $(e).sinaEmotion();
                    event.stopPropagation();
                    $(e).parents('div').find('textarea').text('').css({"font-size":"16px","padding":"10px","line-height":"16px","font-family":"微软雅黑","text-align":"left"});
                }
        }
        function changeInner(e){
            $(e).text('');
            $(e).css({"font-size":"16px","padding":"10px","line-height":"16px","font-family":"微软雅黑","text-align":"left"});
        }

        /*发表*/
        function publish(e){
            var content = $('.commont-input').val();
            if ("<?php echo (session('ycblog1224userinfo')); ?>" == '') {tishi('请先登录');return false;}
            if (content == '' || content == "<?php echo (C("WEB_NAME")); ?>") {tishi('评论不能为空');return false;}
            $(".widget-content").append("<div class='commont-content'><div class='commont-content-left'><img src='/Template/default/Home/Public/img/music_img/cover5.jpg'></div><div class='commont-content-right'><div class='commont-user repalyItFather'><p><span>评论用户名</span><span class='commont-time'>2018年4月5号</span></p><p>"+ content +"<span class='commont-reply' onclick='repalyIt(this)'>回复</span></p></div></div></div>").parseEmotion();
        }
        function publishUser(e){
            $('.my-commont-user').css('display','none');
            var  content = $('.commont-input-er').val();
            if ("<?php echo (session('ycblog1224userinfo')); ?>" == '') {tishi('请先登录');return false;}
            if (content == '' || content == "<?php echo (C("WEB_NAME")); ?>") {tishi('评论不能为空'); return false;}
            $($(e).parents(".repalyVaule")).after('<div class="commont-user-user repalyItFather">2018年4月6号&nbsp;&nbsp; <span>柱子</span> &nbsp;&nbsp;<b>回复了</b>&nbsp;&nbsp;<span>黄磊</span>：'+ content +' <span class="commont-reply" onclick="repalyIt(this)">回复</span></p></div>').parseEmotion();
            
        }   
        function tishi(txt, time, status) {  
            var htmlCon = '';  
            if (txt != '') {  
                if (status != 0 && status != undefined) {  
                    htmlCon = '<div class="tipsBox" style="width:220px;opacity:0.8;padding:10px;background-color:#4AAF33;border-radius:5px;-webkit-border-radius: 4px;-moz-border-radius: 4px;box-shadow:0 0 3px #ddd inset;-webkit-box-shadow: 0 0 3px #ddd inset;text-align:center;position:fixed;top:25%;left:50%;z-index:999999;margin-left:-120px;"><img src="images/ok.png" style="vertical-align: middle;margin-right:5px;" alt="OK，"/>' + txt + '</div>';  
                } else {  
                    htmlCon = '<div class="tipsBox" style="width:200px;padding:10px;opacity:0.8;background-color:#bfbfbf;border-radius:5px;-webkit-border-radius: 4px;-moz-border-radius: 4px;box-shadow:0 0 3px #ddd inset;-webkit-box-shadow: 0 0 3px #ddd inset;text-align:center;position:fixed;top:25%;left:50%;z-index:999999;margin-left:-120px;"><img src="/Template/default/Home/Public/img/error.png" style="vertical-align: middle;margin-right:5px;" alt="Error，"/><span style="font-size:18px;display:inline-block;margin:5px 0 0 10px;">' + txt + '</span></div>';  
                }  
                $('body').prepend(htmlCon);  
                if (time == '' || time == undefined) {  
                    time = 1500;  
                }  
                 setTimeout(function() {  
                    $('.tipsBox').remove();  
                }, time);
            } 
        }
        function noneDiv(){
            $('.my-commont-user').css('display','none');
        }



        function repalyIt(e){
            $('.my-commont-user').css('display','none');
            $($(e).parents(".repalyItFather")).append('<div class="my-commont-user"><textarea class="commont-input" onfocus="changeInner(this)"><?php echo (C("WEB_NAME")); ?></textarea><div class="boottom-face"><img src="/Template/default/Home/Public/img/face.png" onclick="changeFace(this)"></div><div class="bottom-a"><a href="javascript:;" onclick="publish(this)">发表</a><a href="javascript:;" onclick="noneDiv(this)">取消</a></div><div></div></div>');
        }

</script>

<script src="/Template/default/Home/Public/js/excanvas.min.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.pie.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.orderBars.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.resize.js"></script>


<script src="/Template/default/Home/Public/js/bootstrap.js"></script>
<script src="/Template/default/Home/Public/js/charts/bar.js"></script>

</body>
</html>