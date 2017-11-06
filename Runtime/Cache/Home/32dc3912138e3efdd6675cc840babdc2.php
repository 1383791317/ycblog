<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
<title><?php if($tname["name"] != ''): echo ($knowledge["title"]); ?>-<?php endif; if($article["title"] != ''): echo ($knowledge["title"]); ?>-<?php endif; if($knowledge["title"] != ''): echo ($knowledge["title"]); ?>-<?php endif; echo (C("WEB_NAME")); ?></title>
<meta name="keywords" content="<?php echo ($knowledge["keyword"]); ?>"/>
<meta name="description" content="<?php echo ($knowledge["description"]); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link href="/Template/default/Home/Public/css/bootstrap.min.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/bootstrap-responsive.min.css" rel="stylesheet" />

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/font-awesome.css" rel="stylesheet" />

<link href="/Template/default/Home/Public/css/adminia.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/adminia-responsive.css" rel="stylesheet" />

<link href="/Template/default/Home/Public/css/pages/dashboard.css" rel="stylesheet" />
<link href="/Template/default/Home/Public/css/my.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/Template/default/Home/Public/css/audio.css">


<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @media only screen and (min-width: 100px) and (max-width: 600px) {
            .my_css_content{width: 300px; overflow: hidden;}
        }
        @media only screen and (min-width: 600px) and (max-width: 900px) {
            .my_css_content{width: 450px; overflow: hidden;}
        }
        @media only screen and (min-width: 1000px) and (max-width: 1200px) {
            .my_css_content{width: 600px; overflow: hidden;}
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
                    <?php if($_SESSION['ycblogyangchaouserinfo']== ''): ?><li class="dropdown" style="width:100px;padding-left: 20px;">

                            <p data-toggle="dropdown" class="dropdown-toggle">
                                登录
                            </p>
                        </li>
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
                        </li><?php endif; ?>
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
                        <div class="widget">
                            <div class="widget-content">
                                <h2 style="text-align: center">
                                    <?php echo ($knowledge["title"]); ?>
                                </h2>
                                <ul class="my_css_title my_css_title_article">
                                    <li><i class="icon-th-list"></i><?php echo ($knowledge["author"]); ?>
                                    </li>
                                    <li>
                                        <i class="icon-th-list"></i><a><?php echo ($knowledge["add_time"]); ?></a>
                                    </li>
                                </ul>
                                <div class="hr_title_bottom">   <hr/></div>

                                <div class="my_css_content">
                                    <?php echo ($knowledge["content"]); ?>
                                    <p style="text-align: center"><?php echo (C("COPYRIGHT_WORD")); ?></p>
                                </div>
                            </div> <!-- /widget-content -->

                        </div> <!-- /widget -->
                    </div>
                </div> <!-- /row -->

            </div>
            <script>
    /* $(function(){

     /!* console.log(getRandomColor());
     document.getElementById("colorRandom").style.background = getRandomColor();
     *!/
     });*/

</script>
<div class="span3">

        <form class="search_form" action="<?php echo U('Home/Knowledge/index');?>" method="get">
        <input class="search_whole" value="" name="keywords" placeholder="所搜<?php echo (C("WEB_K_ARR.name")); ?>">
        <input type="submit" class="search_button" value="GO"/>
    </form>

    <?php if($_SESSION['ycblog1224userinfo']!= ''): ?><div class="account-container">

            <div class="account-avatar">
                <img src="./img/headshot.png" alt="" class="thumbnail" />
            </div> <!-- /account-avatar -->

            <div class="account-details">

                <span class="account-name">Rod Howard</span>

                <span class="account-role">Administrator</span>

                <span class="account-actions">
							<a href="javascript:;">Profile</a> |

							<a href="javascript:;">Edit Settings</a>
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
            <a href="<?php echo U('Home/Knowledge/index');?>">
                <i class="<?php echo (C("WEB_K_ARR.css_name")); ?>"></i><?php echo (C("WEB_K_ARR.name")); ?>

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
            <p>
                <?php if(is_array($articleLabel)): $i = 0; $__LIST__ = $articleLabel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Index/label',array('lid'=>$v['lid']));?>" class="badge badge-warning colorRandom" style="line-height: 20px;padding: 3px 7px;" ><?php echo ($v["name"]); ?></a>
                    &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
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
        <p>&copy; 2012 Go Ideate.</p>
    </div> <!-- /container -->

</div> <!-- /footer -->




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