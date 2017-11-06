<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 网站管理 <span class="c-gray en">&gt;</span> 歌曲列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="dataLotdel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加歌曲" onclick="music_add('添加歌曲','/index.php/Admin/Website/addMusic','','510')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加歌曲</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value="" id="chk"></th>
                <th width="80">ID</th>
                <th>歌名</th>
                <th>添加时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                    <td><input type="checkbox" value="<?php echo ($v["tid"]); ?>" name="" class="checkbox"></td>
                    <td><?php echo ($v["tid"]); ?></td>
                    <td><?php echo ($v["name"]); ?></td>
                    <td><?php echo ($v["add_time"]); ?></td>
                    <td class="f-14 td-manage">
                        <a style="text-decoration:none" class="ml-5" onClick="article_edit('标签编辑','/index.php/Admin/Article/changeType/tid/<?php echo ($v["tid"]); ?>','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php echo ($v["tid"]); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Template/default/Admin/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Template/default/Admin/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Template/default/Admin/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        //"aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "pading":false,
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,2,4]}// 不参与排序的列
        ]
    });

    /*资讯-添加*/
    function article_add(title,url,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-编辑*/
    function article_edit(title,url,id,w,h){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*资讯-删除*/
    function article_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'get',
                url: '/index.php/Admin/Article/delType/tid/'+id,
                dataType: 'json',
                success: function(data){
                    if(data>0){
                        layer.msg('删除成功',{icon:1,time:1000});
                    }else{
                        layer.msg('删除失败',{icon:1,time:1000});
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    function dataLotdel(){
        layer.confirm('确认要删除吗？', function(index) {
            if ($('#chk:checked')){
                $(".checkbox:checked").each(function () {
                    var id =$(this).val();
                    $.get("/index.php/Admin/Article/delType",{tid:id},function (data) {
                        if (data>0) {
                            $(".checkbox:checked").parent().parent().remove();
                            layer.msg('删除成功', { icon: 5, time: 1000 })
                        }else{
                            layer.msg('删除失败', { icon: 5, time: 1000 })
                        }
                    },"json")
                })
            }else{
                $(".checkbox:checked").each(function () {
                    var id =$(this).val();
                    $.get("/index.php/Admin/Article/delLabel",{lid:id},function (data) {
                        if (data>0) {
                            $(".checkbox:checked").parent().parent().remove();
                            layer.msg('删除成功', { icon: 5, time: 1000 })
                        }else{
                            layer.msg('删除失败', { icon: 5, time: 1000 })
                        }
                    },"json")
                })}
        });
    }
    function music_add(title,url,w,h) {
        layer_show(title,url,w,h);
    }
</script>
</body>
</html>