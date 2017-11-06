<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 11:44
 */
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use Think\Controller;
class IndexController extends AdminBaseController{
    public function index(){
        $this->display();
    }
    public function welcome(){
        $this->display();
    }
}