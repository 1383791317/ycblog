<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/14 0014
 * Time: 12:01
 */
namespace Common\Controller;
class AdminBaseController extends BaseController{
    /**
     * 初始化方法
     */
    public function _initialize(){
        $name = $_SESSION['ycblogyangchaohangadminname'];
        $pwd = $_SESSION['ycblogyangchaohangadminpwd'];
        $result = M('Admin')->where(array('name'=>$name,'password'=>$pwd))->find();
        if (empty($result)){
            redirect('./error');
        }
    }



}