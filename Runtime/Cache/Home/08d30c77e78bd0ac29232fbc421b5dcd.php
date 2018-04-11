<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
<meta charset="utf-8" />
<title><?php if($tname["name"] != ''): ?><>-<?php endif; if($article["title"] != ''): ?><>-<?php endif; if($knowledge["title"] != ''): ?><>-<?php endif; echo (C("WEB_NAME")); ?></title>
<meta name="keywords" content="<?php echo (C("WEB_KEYWORDS")); ?>"/>
<meta name="description" content="<?php echo (C("WEB_DESCRIPTION")); ?>"/>
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
                                    <a href=""><img src="/Template/default/Home/Public/img/weibo.png" width="20px"/></i> 微博</a>
                                </li>
                                <li>
                                    <a href="./account.html"> <img src="/Template/default/Home/Public/img/zhanghao.png" width="20px"/>  账号 </a>
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
                <?php if($tname == ''): ?><h1 class="page-title">
                        <i class="icon-home"></i>
                        首页
                    </h1>
                    <?php else: ?>
                    <h1 class="page-title">
                        <i class="<?php echo ($tname["css_name"]); ?>"></i>
                        <?php echo ($tname["name"]); ?>
                    </h1><?php endif; ?>
                <div class="row">
                    <?php if(is_array($articles)): $i = 0; $__LIST__ = $articles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="span8">
                            <div class="widget">
                                <div class="widget-header">
                                    <h3><?php echo ($v["title"]); ?></h3>
                                </div> <!-- /widget-header -->

                                <div class="widget-content">
                                    <ul class="my_css_title">
                                        <li style="width: 90px"><i class="icon-user" style="font-size:15px; "></i><?php echo ($v["author"]); ?>
                                        </li>
                                        <li>
                                            <i class="icon-time" style="font-size: 15px;"></i><?php echo ($v["add_time"]); ?>
                                        </li>
                                        <li style="width: 90px">
                                            <i class="icon-th-list"></i><a href="/index.php/Home/Index/category/tid/<?php echo ($v["tid"]); ?>"><?php echo ($v["name"]); ?></a>
                                        </li>
                                        <li>
                                            <i class="icon-tags"></i> <?php if(is_array($v["lids"])): $i = 0; $__LIST__ = $v["lids"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Index/label/lid/<?php echo ($val["lid"]); ?>"><?php echo ($val["name"]); ?></a>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                                        </li>
                                    </ul>
                                    <div class="my_css_content">

                                        <div class="my_css_content_img">
                                           <?php if($v["image"] == ''): ?><img src="<?php echo (C("DEFAULT_IMG_URL")); ?>"/><?php else: ?><img src="<?php echo ($v["image"]); ?>"><?php endif; ?>
                                        </div>

                                        <div class="my_css_content_font">
                                            <?php echo ($v["description"]); ?>
                                        </div>
                                        <div class="my_css_yue"><a href="<?php echo U('Home/Index/article',array('aid'=>$v['id']));?>">阅读全文</a></div>
                                    </div>
                                </div> <!-- /widget-content -->

                            </div> <!-- /widget -->
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div> <!-- /row -->
                <div class="pages"><?php echo ($page); ?></div>
            </div> <!-- /span9 -->
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


        </div> <!-- /row -->

    </div> <!-- /container -->

</div> <!-- /content -->


<div id="footer">

    <div class="container">
        <hr />
        <p style="text-align: center">Copyright © 2017 <a href="http://www.ycblog.com.cn">www.yclog.com.cn</a> &nbsp;&nbsp;|&nbsp;&nbsp;<?php echo (C("WEB_ICP_NUMBER")); ?></p>
        <p style="text-align: center">联系邮箱：<?php echo (C("ADMIN_EMAIL")); ?></p>
    </div> <!-- /container -->

</div> <!-- /footer -->

<style>
    .music_logo>a{ position: fixed;  left: 10px;  top: 60%;}
    .music_logo >a >img{
        border-radius: 50px;opacity: 0.5;
    }
    .music_logo>a :hover{
        opacity: 1;
        transform:rotate(90deg);
        -ms-transform:rotate(90deg); 	/* IE 9 */
        -moz-transform:rotate(90deg); 	/* Firefox */
        -webkit-transform:rotate(90deg); /* Safari 和 Chrome */
        -o-transform:rotate(90deg);
    }
</style>
<div class="music_logo"><a href="javascript:;" title="隐藏或显示播放器"  onclick="noneAudio()"><img src="/Template/default/Home/Public/img/music_img/39e6a82e5d68f6baea9ddeb23004b0ae.jpg" width="40" height="40"></a></div>
<div class="audio-box" style="height: 85px;">
    <div class="audio-container">
        <div class="audio-cover"></div>
        <div class="audio-view">
            <h3 class="audio-title">未知歌曲</h3>
            <div class="audio-body">
                <div class="audio-backs">
                    <div class="audio-this-time">00:00</div>
                    <div class="audio-count-time">00:00</div>
                    <div class="audio-setbacks">
                        <i class="audio-this-setbacks">
                            <span class="audio-backs-btn"></span>
                        </i>
                        <span class="audio-cache-setbacks">
							</span>
                    </div>
                </div>
            </div>
            <div class="audio-btn">
                <div class="audio-select">
                    <div class="audio-prev"></div>
                    <div class="audio-play"></div>
                    <div class="audio-next"></div>
                    <div class="audio-menu"></div>
                    <div class="audio-volume"></div>
                </div>
                <div class="audio-set-volume">
                    <div class="volume-box">
                        <i><span></span></i>
                    </div>
                </div>
                <div class="audio-list">
                    <div class="audio-list-head">
                        <p>☺随心听</p>
                        <span class="menu-close">关闭</span>
                    </div>
                    <ul class="audio-inline">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="/Template/default/Home/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Template/default/Home/Public/js/audio.js"></script>
<script type="text/javascript">
    $(function(){
        var song = [
            {
                'cover' : '/Template/default/Home/Public/img/music_img/cover.jpg',
                'src' : '/Template/default/Home/Public/music/Hoaprox - Ngẫu Hứng.mp3',
                'title' : 'Ngẫu Hứng PDD洪荒之力'
            },
            {
                'cover' : '/Template/default/Home/Public/img/music_img/cover.jpg',
                'src' : '/Template/default/Home/Public/music/Pianoboy - The truth that you leave.mp3',
                'title' : 'The truth that you leave'
            },
            {
                'cover' : '/Template/default/Home/Public/img/music_img/cover2.jpg',
                'src' : '/Template/default/Home/Public/music/Martin Tungevaag - Wicked Wonderland.mp3',
                'title' : 'Wicked Wonderland'
            },
        ];

        var audioFn = audioPlay({
            song : song,
            autoPlay : false  //是否立即播放第一首，autoPlay为true且song为空，会alert文本提示并退出
        });

        /* 向歌单中添加新曲目，第二个参数true为新增后立即播放该曲目，false则不播放 */
        audioFn.newSong({
            'cover' : '/Template/default/Home/Public/img/music_img/cover4.jpg',
            'src' : 'http://so1.111ttt.com:8282/2016/5/06m/06/199061931237.m4a?tflag=1494769315&pin=a0b26b2dddd976d74724841f6d2641d6&ip=114.233.172.33#.mp3',
            'title' : '极乐净土 - GARNiDELiA'
        },false);

        /* 暂停播放 */
        //audioFn.stopAudio();

        /* 开启播放 */
        //audioFn.playAudio();

        /* 选择歌单中索引为3的曲目(索引是从0开始的)，第二个参数true立即播放该曲目，false则不播放 */
        //audioFn.selectMenu(3,true);

        /* 查看歌单中的曲目 */
        //console.log(audioFn.song);

        /* 当前播放曲目的对象 */
        //console.log(audioFn.audio);
    });
    function noneAudio()
        {
            $('.audio-box').toggle();
        }
</script>

</body>
</html>
<style type="text/css">
        *{margin:0;padding:0;list-style-type:none;}
        a,img{border:0;}
        /*body{background:url();font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}*/


        /* actGotop */
        @media only screen and (min-width: 100px) and (max-width: 1200px) {
            .actGotop{position:fixed;_position:absolute;bottom:87px;right:0;width:50px;height:50px;display:none; border-radius: 5px;}
            .actGotop a,.actGotop a:link{width:150px;height:195px;display:inline-block;background:url('/Template/default/Home/Public/img/top/5-120601160027-50.gif') no-repeat;_background:url('/Template/default/Home/Public/img/top/blog7year_gotop.gif') no-repeat;outline:none;}
            .actGotop a:hover{background:url('/Template/default/Home/Public/img/top/blog7year_gotopd.gif') no-repeat;outline:none;}
        }
        @media only screen and (min-width: 667px) and (max-width: 8000px) {
        .actGotop{position:fixed;_position:absolute;bottom:80px;right:50px;width:150px;height:195px;display:none;}
        .actGotop a,.actGotop a:link{width:150px;height:195px;display:inline-block;background:url('/Template/default/Home/Public/img/top/blog7year_gotop.png') no-repeat;_background:url('/Template/default/Home/Public/img/top/blog7year_gotop.gif') no-repeat;outline:none;}
        .actGotop a:hover{background:url('/Template/default/Home/Public/img/top/blog7year_gotopd.gif') no-repeat;outline:none;}
        }
    </style>

</head>
<div class="actGotop"><a href="javascript:;" title="返回顶部"></a></div>

<script type="text/javascript" src="/Template/default/Home/Public/js/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(window).scroll(function() {
            if($(window).scrollTop() >= 100){
                $('.actGotop').fadeIn(300);
            }else{
                $('.actGotop').fadeOut(300);
            }
        });
        $('.actGotop').click(function(){
            $('html,body').animate({scrollTop: '0px'}, 800);});
    });
</script>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/Template/default/Home/Public/js/jquery-1.7.2.min.js"></script>
<script src="/Template/default/Home/Public/js/excanvas.min.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.pie.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.orderBars.js"></script>
<script src="/Template/default/Home/Public/js/jquery.flot.resize.js"></script>


<script src="/Template/default/Home/Public/js/bootstrap.js"></script>
<script src="/Template/default/Home/Public/js/charts/bar.js"></script>

  </body>
</html>