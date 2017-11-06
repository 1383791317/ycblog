<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>系统提示信息</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <script type="text/javascript">
        var index = 5;
        function changeTime()
        {
            document.getElementById("timeSpan").innerHTML = index;
            index--;
            if(index < 0){
                window.location = "{$jumpUrl}";
            }
            else{
                window.setTimeout("changeTime()",1000);
            }
        }
    </script>
</head>
<body onload="changeTime()">
<div style="width: 1000px;margin: 50px auto 0">
<table border="1" align="center" width="600">
    <tr>
        <td><b>系统提示信息</b></td>
    </tr>
    <tr>
        <td align="center">
            <br/>{$message} 页面将在 <span id="timeSpan">5</span> 秒钟内自动跳转！<br/>
            <br/>如果没有自动跳转，<a href="{$jumpUrl}">请点击这里</a>。<br/><br/>
        </td>
    </tr>
</table>
</div>
</body>
</html>