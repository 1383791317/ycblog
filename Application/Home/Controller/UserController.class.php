<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/18 0018
 * Time: 16:50
 */
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class UserController extends HomeBaseController {

    // 第三方平台登录
    public function oauth_login(){
        $type=I('get.type');
        import("Org.ThinkSDK.ThinkOauth");
        $sdk= \ThinkOauth::getInstance($type);
        redirect($sdk->getRequestCodeURL());
    }

    // 第三方平台退出
    public function logout(){
        session('ycblog1224userinfo',null);
    }

   
}
