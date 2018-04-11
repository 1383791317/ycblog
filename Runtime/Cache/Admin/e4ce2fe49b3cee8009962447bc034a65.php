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
    <style>
        .formControls>input{width: 50%}
    </style>
</head>
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-article-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站状态：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <?php if(C("WEB_STATUS")== 1): ?><input name="WEB_STATUS" type="radio" checked value="1"><?php else: ?><input name="WEB_STATUS" type="radio" value="1"><?php endif; ?>
                    <label for="sex-1">显示</label>
                </div>
                <div class="radio-box">
                    <?php if(C("WEB_STATUS")== 0): ?><input type="radio" name="WEB_STATUS" checked value="0"><?php else: ?> <input type="radio" name="WEB_STATUS" value="0"><?php endif; ?>
                    <label for="sex-2">不显示</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站关闭时提醒文字：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" placeholder="" name="WEB_CLOSE_WORD" value="<?php echo (C("WEB_CLOSE_WORD")); ?>">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>备案号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" placeholder="" name="WEB_ICP_NUMBER" value="<?php echo (C("WEB_ICP_NUMBER")); ?>">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>站长邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" placeholder="" name="ADMIN_EMAIL" id="" value="<?php echo (C("ADMIN_EMAIL")); ?>">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("WEB_NAME")); ?>" placeholder="" id="username" name="WEB_NAME">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站关键字：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("WEB_KEYWORDS")); ?>" placeholder=""  name="WEB_KEYWORDS">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>网站描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("WEB_DESCRIPTION")); ?>" placeholder="" name="WEB_DESCRIPTION">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章保留权限：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("COPYRIGHT_WORD")); ?>" placeholder=""  name="COPYRIGHT_WORD">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>编辑器图片上传路径：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("UPLOAD_IMG_URL")); ?>" placeholder=""  name="UPLOAD_IMG_URL">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章默认图片：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("DEFAULT_IMG_URL")); ?>" placeholder=""  name="DEFAULT_IMG_URL">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>小知识：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("WEB_K_ARR.name")); ?>" placeholder=""  name="WEB_K_ARR_NAME">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>小知识logo：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text radius" value="<?php echo (C("WEB_K_ARR.css_name")); ?>" placeholder=""  name="WEB_K_ARR_CSS_NAME">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
<script type="text/javascript" src="/Template/default/Admin/Public/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
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
                ADMIN_EMAIL:{
                    required:true,
                    email:true
                },
                WEB_STATUS:{
                    required:true,
                },
                WEB_CLOSE_WORD:{
                    required:true,
                },
                WEB_ICP_NUMBER:{
                    required:true,
                },
                WEB_NAME:{
                    required:true,
                },
                WEB_KEYWORDS:{
                    required:true,
                },
                WEB_DESCRIPTION:{
                    required:true,
                },
                COPYRIGHT_WORD:{
                    required:true,
                },
                UPLOAD_IMG_URL:{
                    required:true,
                },
                DEFAULT_IMG_URL:{
                    required:true,
                },
                WEB_K_ARR_NAME:{
                    required:true,
                },
                WEB_K_ARR_CSS_NAME:{
                    required:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/index.php/Admin/Website/configWebsite" ,
                    success: function(data){
                            layer.msg(data,{icon:1,time:1000});
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });
//                var index = parent.layer.getFrameIndex(window.name);
//                parent.$('.btn-refresh').click();
//                parent.layer.close(index);
            }
        });
        var ue = UE.getEditor('editor');

    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>