/**
 * Created by Administrator on 2017/11/8 0008.
 */
window.onload = function(){
    function $(id){ return document.getElementById(id);}
    var js_slider = $("js_slider");
    var slider_main = $("slider_main"); //获取轮播图片的父盒子
    var imgs = slider_main.children; //得到图片组
    var slider_ctrl = $("slider_ctrl"); //获取控制的 父盒子

    //生成控制轮播的span
    for(var i = 0; i< imgs.length; i++){
        var span = document.createElement("span");
        span.className = "slider-ctrl-con";
        span.innerHTML = imgs.length - i;
        slider_ctrl.insertBefore(span,slider_ctrl.children[1]);
    }
    var spans = slider_ctrl.children;
    spans[1].setAttribute("class","slider-ctrl-con current"); //设置第一个span增加current样式

    //布局图片，第一张在正确位置，其余的在右边
    var scrollWidth = js_slider.clientWidth; //获取大盒子的宽度，也就是后面动画走的距离
    for(var i=1; i<imgs.length; i++){ //第一张图片在正确位置
        imgs[i].style.left = scrollWidth + "px"; //其余图片在310px的位置
    }

    //遍历三个按钮--左、右和下面的span
    var iNow = 0; //设置当前显示的图片的索引号
    for(var k in spans){ //k是索引号
        spans[k].onclick = function(){
            if(this.className == "slider-ctrl-prev"){

                //当前图片右移（从0 -> 310px）
                animate(imgs[iNow],{left: scrollWidth});
                iNow = --iNow < 0 ? imgs.length-1 : iNow;
                imgs[iNow].style.left = -scrollWidth + "px";//快速执行，即将显示的一页立马走到左边，然后显示
                animate(imgs[iNow],{left:0}); //下一张图片右移，从-310px->0
                setSquare();
            }else if(this.className == "slider-ctrl-next"){

                //当前图片左移（从0 -> -310px）
                animate(imgs[iNow],{left: -scrollWidth});
                iNow = (++iNow) % imgs.length;
                imgs[iNow].style.left = scrollWidth + "px";//快速执行，即将显示的一页立马走到右边，然后左移显示
                animate(imgs[iNow],{left:0}); //下一张图片左移，从310px->0
                setSquare();
                //或者精简为函数
                /*autoPlay();*/
            }else{
                /*alert("点击了下面的span");*/
                var clickIndex = this.innerHTML - 1;
                if(clickIndex > iNow){
                    //做法等同于右侧按钮
                    animate(imgs[iNow],{left: -scrollWidth});
                    imgs[clickIndex].style.left = scrollWidth + "px";//快速执行，即将显示的一页立马走到右边，然后左移显示
                }else if(clickIndex < iNow){
                    //做法等同于左侧
                    animate(imgs[iNow],{left: scrollWidth});
                    imgs[clickIndex].style.left = -scrollWidth + "px";//快速执行，即将显示的一页立马走到左边，然后显示
                }
                iNow = clickIndex;
                animate(imgs[iNow],{left:0});
                setSquare();
            }
        }
    }
    //控制span小方块的样式 函数
    function setSquare(){
        //下面的span样式清空，将iNow设置为current，注意是下面的span，不包含左右控制按钮
        for(var i=1; i<spans.length-1; i++){
            spans[i].className = "slider-ctrl-con";
        }
        spans[iNow+1].className = "slider-ctrl-con current"; //注意iNow是索引号，要加1
    }

    //设置定时器 ，和右侧按钮功能一致
    var timer =null;
    timer = setInterval(autoPlay,2000);
    function autoPlay(){
        animate(imgs[iNow],{left: -scrollWidth});
        iNow = (++iNow) % imgs.length;
        imgs[iNow].style.left = scrollWidth + "px";//快速执行，即将显示的一页立马走到右边，然后左移显示
        animate(imgs[iNow],{left:0}); //下一张图片左移，从310px->0
        setSquare();
    }

    //清除定时器
    js_slider.onmouseover = function(){
        clearInterval(timer);
    }
    //开启定时器
    js_slider.onmouseout = function(){
        clearInterval(timer); //要执行定时器，先清除定时器
        timer = setInterval(autoPlay,2000);
    }
}