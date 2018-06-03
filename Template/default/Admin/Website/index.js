$(function () {
    var _height =  document.documentElement.clientHeight;
    console.log(_height)
    $(".container").css("height",_height);


    var currYear = (new Date()).getFullYear();
    var opt={};
    opt.date = {preset : 'date'};
    opt.datetime = {preset : 'datetime'};
    opt.time = {preset : 'time'};
    opt.default = {
        theme: 'android-ics light', //皮肤样式
        display: 'modal', //显示方式
        mode: 'scroller', //日期选择模式
        dateFormat: 'yyyy-mm-dd',
        lang: 'zh',
        showNow: true,
        nowText: "今天",
        startYear: currYear - 30, //开始年份
        endYear: currYear + 5 //结束年份
    };

    $("#appDate").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate1").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate2").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate3").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate4").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate2-1").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate3-1").mobiscroll($.extend(opt['date'], opt['default']));
    $("#appDate4-1").mobiscroll($.extend(opt['date'], opt['default']));
    var optDateTime = $.extend(opt['datetime'], opt['default']);
    var optTime = $.extend(opt['time'], opt['default']);
    $("#appDateTime").mobiscroll(optDateTime).datetime(optDateTime);
    $("#appTime").mobiscroll(optTime).time(optTime);

});
//添加工作经历
function addMore(idx) {
    switch (idx){
        case 1:
            $(".jobList2").css("display","block");
            break;
        case 2:
            $(".jobList3").css("display","block");
            break;
    };
};
//选择性别
function choseSex(idx,ele) {
    switch (idx){
        case 1:
            $(".choseBox").addClass("choseBoxBlock");
            $(".sexBox").css("display","block");
            $(".job").css("display","none");
            break;
        case 2:
            $(".info_Sex").val($(ele).html());
            $(".choseBox").removeClass("choseBoxBlock");
            break;
        case 3:
            $(".choseBox").addClass("choseBoxBlock");
            $(".job").css("display","block");
            $(".sexBox").css("display","none");
            break;
        case 4:
            $(".info_post").val($(ele).html());
            $(".choseBox").removeClass("choseBoxBlock");
            break;
    };

};
//简介
function clearTxt(ele,idx) {
    switch (idx){
        case 0:
            if ($(ele).html() == "请输入您的工作职责"){
                $(ele).html("");
            };
            break;
        case 1:
            if ($(ele).html() == "做一段自我介绍吧~"){
                $(ele).html("");
            };
            break;
    }

};
function addTxt(ele,idx) {
    switch (idx){
        case 0:
            if ($(ele).html() == ""){
                $(ele).html("请输入您的工作职责");
            };
            break;
        case 1:
            if ($(ele).html() == ""){
                $(ele).html("做一段自我介绍吧~");
            };
            break;
    }

};
function upImgs(ele) {
    var file = ele[0];
    //创建读取文件的对象
    var reader = new FileReader();
    //创建文件读取相关的变量
    var imgFile;
    //为文件读取成功设置事件
    reader.onload=function(e) {
        imgFile = e.target.result;
        $(".info_img").attr("src",imgFile);
    };
    //正式读取文件
    reader.readAsDataURL(file);
};
var one = true;
if (one){
    function upLoad() {
        // console.log(one)
        one = false;
        $(".infoBtn").html("正在提交，请稍等...");
        var infoName = $(".info_name").val(),
            infoSex = $(".info_Sex").val(),
            infoPost = $(".info_post").val(),
            infoBirthday = $(".info_birthday").val(),
            infoSchool = $(".info_school").val(),
            infoEnd = $(".info_end").val(),
            infoMoney = $(".info_money").val(),
            infoIDCard = $(".info_idCard").val(),
            infoTel = $(".info_tel").val(),
            infoMail = $(".info_mail").val(),
            jobTimeStrat1 = $(".jobTimeStart1").val(),
            jobTimeEnd1 = $(".jobTimeEnd1").val(),
            jobCompany1 = $(".jobCompany1").val(),
            jobPost1 = $(".jobPost1").val(),
            jobRes1 = $(".jobRes1").val(),

            jobTimeStrat2 = $(".jobTimeStart2").val(),
            jobTimeEnd2 = $(".jobTimeEnd2").val(),
            jobCompany2 = $(".jobCompany2").val(),
            jobPost2 = $(".jobPost2").val(),
            jobRes2 = $(".jobRes2").val(),

            jobTimeStrat3 = $(".jobTimeStart3").val(),
            jobTimeEnd3 = $(".jobTimeEnd3").val(),
            jobCompany3 = $(".jobCompany3").val(),
            jobPost3 = $(".jobPost3").val(),
            jobRes3 = $(".jobRes3").val(),

            infoImg = $(".info_img").attr("src"),
            infoSelf = $(".info_self").val();

            //姓名
            if(!infoName){
                alert("名字不能为空哟~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //性别
            if(!infoSex){
                alert("请选择性别~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //岗位
            if(!infoPost){
                alert("请选择岗位~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //生日
            if(!infoBirthday){
                alert("请选择生日~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //学历
            if(!infoSchool){
                alert("请输入您的最高学历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //毕业时间
            if(!infoEnd){
                alert("请选择您的毕业时间~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //期望薪资
            if(!infoMoney){
                alert("请输入您的期望薪资~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
        
            //手机号码
            if(!infoTel){
                alert("电话号码不能为空哟~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //邮箱
            if(!infoMail){
                alert("邮箱不能为空哟~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //工作经历1--时间开始
            if(!jobTimeStrat1){
                alert("请至少完善一个工作经历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //工作经历1--时间结束
            if(!jobTimeEnd1){
                alert("请至少完善一个工作经历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //工作经历1--单位
            if(!jobCompany1){
                alert("请至少完善一个工作经历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //工作经历1--岗位
            if(!jobPost1){
                alert("请至少完善一个工作经历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //工作经历1--职责
            if(!jobRes1){
                alert("请至少完善一个工作经历~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //照片
            if(!infoImg){
                alert("请上传一张您的证件照（修过的也行 [手动滑稽]）~");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            //自我评价
            if (!infoSelf){
                alert("自我评价不能为空哟");
                one = true;
                $(".infoBtn").html("提交");
                return false;
            };
            $.ajax({
                type:"POST",
                url:"https://www.ycblog.com.cn/index.php/api/sg/index",
                dataType:"json",
                data:{
                    name:infoName,
                    sex:infoSex,
                    station:infoPost,
                    birth_time:infoBirthday,
                    education:infoSchool,
                    graduation_time:infoEnd,
                    pay:infoMoney,
                    id_number:infoIDCard,
                    phone:infoTel,
                    email:infoMail,
                    my_appraise:infoSelf,
                    photo:infoImg,

                    start_time1:jobTimeStrat1,
                    end_time1:jobTimeEnd1,
                    company1:jobCompany1,
                    duty1:jobPost1,
                    responsibility1:jobRes1,

                    start_time2:jobTimeStrat2,
                    end_time2:jobTimeEnd2,
                    company2:jobCompany2,
                    duty2:jobPost2,
                    responsibility2:jobRes2,

                    start_time3:jobTimeStrat3,
                    end_time3:jobTimeEnd3,
                    company3:jobCompany3,
                    duty3:jobPost3,
                    responsibility3:jobRes3,


                },
                success:function (e) {
                    alert(e)
                    one = false;
                    $(".infoBtn").html("正在提交，请稍等...");
                },
                error:function (f) {
                    console.log(f)
                }
            });
    };
}











