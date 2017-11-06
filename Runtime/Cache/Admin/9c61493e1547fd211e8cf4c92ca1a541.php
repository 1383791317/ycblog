<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Template/default/Admin/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Template/default/Admin/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Template/default/Admin/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Template/default/Admin/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Template/default/Admin/Public/static/h-ui.admin/css/style.css" />
<link href="/Template/default/Home/Public/css/font-awesome.css" rel="stylesheet" />
<!--[if IE 6]>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>YC-blog后台管理</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-article-add">
        <input name="tid" value="<?php echo ($result["tid"]); ?>" style="display: none">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>标签名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($result["name"]); ?>" placeholder="" id="articletitle" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类图标：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php if(is_array($result["logo"])): $i = 0; $__LIST__ = $result["logo"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;<label><input type="radio"  name="logo_id" value="<?php echo ($v["logo_id"]); ?>">&nbsp;<i class="<?php echo ($v["css_name"]); ?>"></i></label>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Template/default/Admin/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Template/default/Admin/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        //表单验证
        $("#form-article-add").validate({
            rules:{
                name:{
                    required:true,
                },
                logo_id:{
                    required:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/index.php/Admin/Article/changeType" ,
                    success: function(data){
                        if (data>0){
                            layer.msg('修改成功',{icon:1,time:1000});
                        }else{
                            layer.msg('修改失败',{icon:1,time:1000});
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
            }
        });
        var ue = UE.getEditor('editor');

    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>