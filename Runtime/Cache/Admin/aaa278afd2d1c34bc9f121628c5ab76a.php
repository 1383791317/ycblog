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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c">
        <button onclick="removeIframe()" class="btn btn-primary radius">关闭选项卡</button>
        日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })" id="logmin" class="input-text Wdate" style="width:120px;">
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })" id="logmax" class="input-text Wdate" style="width:120px;">
        <input type="text" name="" placeholder=" 公告标题" style="width:250px" class="input-text">
        <button name="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜公告</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="dataLotdel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加文章" data-href="/index.php?s=/Admin/Article/articleAddPage" onclick="Hui_admin_tab(this)" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加文章</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value="" id="chk"></th>
                <th width="80">ID</th>
                <th>标题</th>
                <th>分类</th>
                <th>作者</th>
                <th>更新时间</th>
                <th width="120">点击次数</th>
                <th width="60">发布状态</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                    <td><input type="checkbox" value="<?php echo ($v["id"]); ?>" name="" class="checkbox"></td>
                    <td><?php echo ($v["id"]); ?></td>
                    <td class="text-l"><?php echo ($v["title"]); ?></u></td>
                    <td><?php echo (selecttype($v["tid"],$v.tid)); ?></td>
                    <td><?php echo ($v["author"]); ?></td>
                    <td><?php echo ($v["add_time"]); ?></td>
                    <td><?php echo ($v["click"]); ?></td>
                    <td class="td-status"><?php if($v["is_show"] == 1): ?><span class="label label-success radius">已显示</span><?php else: ?><span class="label label-defaunt radius">不显示</span><?php endif; ?></td>
                    <td class="f-14 td-manage">
                        <?php if($v["is_show"] == 1): ?><a style="text-decoration:none" onClick="article_stop(this,'<?php echo ($v["id"]); ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a><?php else: ?><a style="text-decoration:none" onClick="article_start(this,'<?php echo ($v["id"]); ?>')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe6de;</i></a><?php endif; ?>
                        <a style="text-decoration:none" class="ml-5" onClick="article_edit('文章编辑','/index.php?s=/Admin/Article/changeArticle/id/<?php echo ($v["id"]); ?>','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'<?php echo ($v["id"]); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
            {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
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
                url: '/index.php?s=/Admin/Article/delArticle/id/'+id,
                dataType: 'json',
                success: function(data){
    //                alert(data)
                    if(data.flag=='success'){
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg,{icon:1,time:1000});
                    }else{
                        layer.msg(data.msg,{icon:1,time:1000});
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
                    $.get("/index.php?s=/Admin/Article/delArticle",{id:id},function (data) {
                        if (data.flag=='success') {
                            $(".checkbox:checked").parent().parent().remove();
                            layer.msg(data.msg, { icon: 5, time: 1000 })
                        }else{
                            layer.msg(data.msg, { icon: 5, time: 1000 })
                        }
                    },"json")
                })
            }else{
                $(".checkbox:checked").each(function () {
                    var id =$(this).val();
                    $.get("/index.php?s=/Admin/Article/delArticle",{id:id},function (data) {
                        if (data.flag=='success') {
                            $(".checkbox:checked").parent().parent().remove();
                            layer.msg(data.msg, { icon: 5, time: 1000 })
                        }else{
                            layer.msg(data.msg, { icon: 5, time: 1000 })
                        }
                    },"json")
                })}
        });
    }
//    /*资讯-审核*/
//    function article_shenhe(obj,id){
//        layer.confirm('审核文章？', {
//                btn: ['通过','不通过','取消'],
//                shade: false,
//                closeBtn: 0
//            },
//            function(){
//                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
//                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
//                $(obj).remove();
//                layer.msg('已发布', {icon:6,time:1000});
//            },
//            function(){
//                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
//                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
//                $(obj).remove();
//                layer.msg('未通过', {icon:5,time:1000});
//            });
//    }
    /*资讯-下架*/
    function article_stop(obj,id) {
        layer.confirm('确认要不显示吗？', function (index) {
            $.ajax({
                url:'/index.php?s=/Admin/Article/changeStatus',
                type:'get',
                data:{status:0,id:id},
                dataType:'json',
                success:function (data) {
                    if (data>0){
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,'+ id +')" href="javascript:;" title="显示"><i class="Hui-iconfont">&#xe603;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">不显示</span>');
                        $(obj).remove();
                        layer.msg('已不显示!', {icon: 5, time: 1000});
                    }else{
                        layer.msg('不显示失败!',{icon: 5,time:1000});
                    }
                }
            })
        });
    }
    /*公告-发布*/
    function article_start(obj,id){
        layer.confirm('确认要显示吗？',function(index){
            $.ajax({
                url:'/index.php?s=/Admin/Article/changeStatus',
                type:'get',
                data:{status:1,id:id},
                dataType:'json',
                success:function (data) {
                    if (data>0){
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,'+ id +')" href="javascript:;" title="不显示"><i class="Hui-iconfont">&#xe6de;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已显示</span>');
                        $(obj).remove();
                        layer.msg('已显示!', {icon: 5, time: 1000});
                    }else{
                        layer.msg('显示失败!',{icon: 6,time:1000});
                    }
                }
            })

        });
    }
</script>
</body>
</html>