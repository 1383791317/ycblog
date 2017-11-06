<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25 0025
 * Time: 10:47
 */
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function index(){
        if (IS_POST){
            $name = I('post.name');
            $pwd = I('post.pwd');
            $status = I('post.status');
            $y_pwd = M('Admin')
                ->where(array('name'=>$name))
                ->find();
            if (!empty($y_pwd)){
                if (sha1(md5($pwd))==$y_pwd['password']){
                        $_SESSION['ycblogyangchaohangadminname'] = $name;
                        $_SESSION['ycblogyangchaohangadminpwd'] = sha1(md5($pwd));
                        if ($status == '1'){
                                cookie('name',null);
                                cookie('password',null);
                                cookie('name',$name,86400);
                                cookie('password',$pwd,86400);
                        }
                    $this->success('登录成功',U('Admin/Index/index'));
                }else{
                    $this->error('密码错误',U('Admin/Login/index'));
                }
            }else{
                $this->error('账号错误',U('Admin/Login/index'));
            }
        }else{
            $this->display();
        }
    }
    public function quit(){
        unset($_SESSION['ycblogyangchaohangadminname']);
        unset($_SESSION['ycblogyangchaohangadminpwd']);
        redirect(U('Admin/Login/index'));
    }
}