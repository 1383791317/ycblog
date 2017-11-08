<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/24 0024
 * Time: 16:37
 */
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use Think\Controller;
class WebsiteController extends AdminBaseController{
    public function link(){
        $result = M('Link')->select();
        $count = M('Link')->count();
        $this->assign('count',$count);
        $this->assign('link',$result);
        $this->display();
    }
    public function addlink(){
        if (IS_POST){
            $result = M('Link')->add($_POST);
            echo json_encode($result);
        }else{
            $this->display();
        }
    }
    public function dellink(){
        $id = I('get.id');
        $result = M('Link')
            ->where(array('id'=>$id))
            ->delete();
        echo json_encode($result);
    }
    public function changestatus(){
        $status = I('get.status');
        $id = I('get.id');
        $result = M('Link')
            ->where(array('id'=>$id))
            ->save(array('is_show'=>$status));
        echo json_encode($result);
    }
    public function changelink(){
        if (IS_POST){
            $id = I('post.id');
            unset($_POST['id']);
            $result = M('Link')
                ->where(array('id'=>$id))
                ->save($_POST);
            echo json_encode($result);
        }else{
            $id = I('get.id');
            $link = M('Link')->where(array('id'=>$id))->find();
            $this->assign('linkOne',$link);
            $this->display();
        }
    }
    //网站设置
    public function configwebsite(){
        if (IS_POST){
           $result = writeWebConfig(I('post.'));
           if ($result){
              echo '修改成功';
           }else{
              echo '修改失败';
           }
        }else{
            $this->display();
        }
    }
    public function changepassword(){
        if (IS_POST){
            $result =  D('Admin')->changePwd();
           echo $result;
        }else{
            $this->display();
        }
    }
    //歌单
    public function music(){
        if (IS_POST){

        }else{
            $this->display();
        }
    }
    public function addmusic(){
        if (IS_POST){
            print_r($_POST);
        }else{
            $this->display();
        }
    }
}