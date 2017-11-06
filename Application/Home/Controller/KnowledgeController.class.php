<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6 0006
 * Time: 11:09
 */
namespace Home\Controller;
use Common\Controller\HomeBaseController;
use Think\Think;
class KnowledgeController extends HomeBaseController{
    public function index(){
        if (IS_GET){
            $assign = D('Knowledge')->selectData();
            $this->assign($assign);
            $this->display();
        }else{
            $assign = D('Knowledge')->selectData();
            $this->assign($assign);
            $this->display();
        }
    }
    public function one(){
        $assign = D('Knowledge')->selectData();
        $this->assign($assign);
        $this->display();
    }
}