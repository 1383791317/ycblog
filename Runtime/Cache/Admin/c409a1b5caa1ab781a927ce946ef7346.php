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
        <input name="id" value="<?php echo ($article["id"]); ?>" style="display: none;">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($article["title"]); ?>" placeholder="" id="articletitle" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章作者：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($article["author"]); ?>" placeholder="" id="author" name="author">
            </div>
        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章类型：</label>-->
            <!--<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">-->
				<!--<select name="tid" class="select">-->
                    <!--<?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>-->
                         <!--<?php if($article["tid"] == $v.tid): ?>-->
                            <!--<option value="<?php echo ($v["tid"]); ?>" selected><?php echo ($v["name"]); ?></option>-->
                        <!--<?php endif; ?>-->
                        <!--<?php if($article["tid"] != $v.tid): ?>-->
                            <!--<option value="<?php echo ($v["tid"]); ?>"><?php echo ($v["name"]); ?></option>-->
                        <!--<?php endif; ?>-->
                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
				<!--</select>-->
				<!--</span> </div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标签：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="skin-minimal">
                    原标签：
                    <?php if(is_array($label_y)): $i = 0; $__LIST__ = $label_y;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="check-box">
                            <input type="checkbox" checked disabled>
                            <label for="checkbox-1"><?php echo (selectlabel($val["lid"],$val.lid)); ?></label>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    新标签:
                    <?php if(is_array($label)): $i = 0; $__LIST__ = $label;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="check-box">
                            <input type="checkbox" id="checkbox-1" value="<?php echo ($v["lid"]); ?>" name="lids[]">
                            <label for="checkbox-1"><?php echo ($v["name"]); ?></label>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">关键词：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo ($article["keywords"]); ?>" placeholder="多关键字,用英文逗号隔开" id="keywords" name="keywords">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章摘要：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="description" cols="" rows="" class="textarea"  placeholder="可不填，截取文章中的文字。" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="$.Huitextarealength(this,200)"><?php echo ($article["description"]); ?></textarea>
                <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">不显示：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    <?php if($article["is_show"] == 0): ?><input type="checkbox"  name="allowcomments" value="0" checked>
                        <?php else: ?>
                        <input type="checkbox" name="allowcomments" value="0"><?php endif; ?>
                    <label for="checkbox-pinglun">&nbsp;</label>
                </div>
            </div>
        </div>
        <!--<div class="row cl">-->
        <!--<label class="form-label col-xs-4 col-sm-2">评论开始日期：</label>-->
        <!--<div class="formControls col-xs-8 col-sm-9">-->
        <!--<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'commentdatemax\')||\'%y-%M-%d\'}' })" id="commentdatemin" name="commentdatemin" class="input-text Wdate">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="row cl">-->
        <!--<label class="form-label col-xs-4 col-sm-2">评论结束日期：</label>-->
        <!--<div class="formControls col-xs-8 col-sm-9">-->
        <!--<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{$dp.$D(\'commentdatemin\')}' })" id="commentdatemax" name="commentdatemax" class="input-text Wdate">-->
        <!--</div>-->
        <!--</div>-->
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">文章内容：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea id="editor" type="text/plain" style="width:100%;height:400px;" name="content"><?php echo ($article["content"]); ?>
                </textarea></div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
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
                title:{
                    required:true,
                },
                articletype:{
                    required:true,
                },
                keywords:{
                    required:true,
                },
                libs:{
                    required:true,
                },
                author:{
                    required:true,
                }
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "/index.php/Admin/Article/changeArticle" ,
                    success: function(data){
                        //alert(data)
                       layer.msg(data,{icon:1,time:1000});
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