<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 14:31
 */
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
use Think\Controller;
class ArticleController extends AdminBaseController{
    protected $db;
    public function __construct(){
        parent::__construct();
        $this->db=D('Article');
        $this->kdb=D('Knowledge');
    }
    //文章列表
    public function articlelist(){
        $info = $this->db->select();
        $count = $this->db->count();
        $this->assign('info',$info);
        $this->assign('count',$count);
        $this->display();
    }
    //添加文章
    public function articleaddpage(){
        if(IS_POST){
           echo $this->db->addData();
            //  echo $this->db->addData();
        }else{
            $article_type = M('ArticleType')->select();
            $label = M('ArticleLabel')->select();
            if(empty($article_type)){
                echo "<script>alert('请先添加分类');</script>";
            }
            if (empty($label)){
                echo "<script>alert('请先添加标签');</script>";
            }
            $assign = array(
                'type'=>$article_type,
                'label'=>$label
            );
            $this->assign($assign);
            $this->display();
        }
    }
    //修改文章
    public function changearticle(){
        if (IS_POST){
            print_r( $this->db->changeData());
           // echo $this->db->changeData();
        }else{
            $id = I('get.id');
            $result = $this->db->where("id={$id}")->find();
            //$article_type = M('ArticleType')->select();
            $label = M('ArticleLabel')->select();
            $label_y = M('AlRelation')->where("aid={$result['id']}")->field('lid')->select();
            $assign = array('article'=>$result,'label'=>$label,'label_y'=>$label_y);
            $this->assign($assign);
            $this->display();
        }
    }
    //更改状态
    public function changestatus(){
        $id = I('get.id');
        $kid = I('get.kid');
        $status = I('get.status');
        if ($id){
            $result = $this->db->where(array('id'=>$id))->save(array('is_show'=>$status));
            echo json_encode($result);
        }else if ($kid){
            $result = $this->kdb->where(array('kid'=>$kid))->save(array('is_show'=>$status));
            echo json_encode($result);
        }
    }
    // 删除文章
    public function delarticle(){
        $result = $this->db->delData();
        print $result;
    }
    //标签列表
    public function labellist(){
        $model = M('ArticleLabel');
        $label = $model->select();
        $count = $model->count();
        $this->assign('count',$count);
        $this->assign('label',$label);
        $this->display();
    }
    //添加标签
    public function labeladd(){
        if (IS_POST){
           $result = M('ArticleLabel')->add($_POST);
           echo $result;
        }else{
            $this->display();
        }
    }
    //编辑列表
    public function changelabel(){
        $model = M('ArticleLabel');
        if (IS_POST){
            $lid=I('post.lid');
            $name = I('post.name');
            $result=$model
                ->where("lid={$lid}")
                ->save(array('name'=>$name));
            echo json_encode($result);
        }else{
            $id = I('get.lid');
            $result = $model
                ->where("lid={$id}")
                ->find();
            $this->assign('result',$result);
            $this->display();
        }
    }
    public function dellabel(){
        $result = M('ArticleLabel')->where("lid={$_GET['lid']}")->delete();
        echo $result;
    }
    //分类列表
    public function typelist(){
        $model = M('ArticleType');
        $data = $model->select();
        $count = $model->count();
        $this->assign('type',$data);
        $this->assign('count',$count);
        $this->display();
    }
    //添加分类
    public function typeadd(){
        $model = M('ArticleType');
        if (IS_POST){
            $add = $model
                ->add(I('post.'));
            echo json_encode($add);
        }else{
            $logo = selectLogo();
            $this->assign('logo',$logo);
            $this->display();
        }
    }
    public function changetype(){
        $model = M('ArticleType');
        if (IS_POST){
            $tid=I('post.tid');
            $name = I('post.name');
            $logo_id = I('post.logo_id');
            $result=$model
                ->where("tid={$tid}")
                ->save(array('name'=>$name,'logo_id'=>$logo_id));
            echo json_encode($result);
        }else{
            $id = I('get.tid');
            $result = $model
                ->where("tid={$id}")
                ->find();
            $result['logo'] = selectLogo();
            $this->assign('result',$result);
            $this->display();
        }
    }
    public function deltype(){
       $tid = I('get.tid');
       $result = M('ArticleType')
           ->where("tid={$tid}")
           ->delete();
       echo json_encode($result);
    }
    public function knowledgelist(){
        $assign = $this->kdb->selectData();
        $this->assign($assign);
        $this->display();
    }
    public function knowledgeadd(){
        if (IS_POST){
           // print_r($this->kdb->knowledgeAdd());
           echo $this->kdb->knowAdd();
        }else{
            $this->display();
        }
    }
    public function changeKnowledge(){
        if (IS_POST){
           // print_r($_POST);
           echo $this->kdb->changeKnowledge();
        }else{
            $assign = $this->kdb->selectData();
            $this->assign($assign);
            $this->display();
        }
    }
    public function delKnowledge(){
       $result = $this->kdb->deleteData();
       echo json_encode($result);
    }
}
