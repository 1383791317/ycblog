<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/20 0020
 * Time: 10:16
 */
namespace Common\Model;
use Common\Model\BaseModel;
use Think\Page;
class ArticleViewModel extends BaseModel{
    public function articleData($tid='all',$lid='all',$is_show='1',$limit='10'){
        if ($tid=='all'&&$lid=='all'){
            $where= array('is_show'=>$is_show);
            $count = $this ->where($where)->count();
            $page = new Page($count,$limit);
            $articles = $this
                ->where($where)
                ->order('add_time desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            foreach ($articles as $k=>$v){
                $articles[$k]['lids']= D('AlRelation')->getAidData($articles[$k]['id']);
            }
        }else if ($tid!=='all'&&$lid=='all'){
            $tname = M('TypeLogoView')
                ->where("tid={$tid}")
                ->field('css_name,name')
                ->find();
            $where = array(
                'tid'=>$tid,
                'is_show'=>'1'
            );
            $count = $this->where($where)->count();
            $page = new Page($count,$limit);
            $articles =$this
                ->where($where)
                ->order('add_time desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            foreach ($articles as $k=>$v){
                $articles[$k]['lids']= D('AlRelation')->getAidData($articles[$k]['id']);
            }
        }else if($tid=='all'&&$lid!=='all'){
            $where = array(
                'lid'=>$lid,
            );
            $lname = M('ArticleLabel')->where($where)->getField('name');
            $count = M('AlRelation')->where($where)->count();
            $page = new Page($count,$limit);
            $articles = M('AlRelation')
                ->where($where)
                ->order('aid desc')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
            foreach ($articles as $k=>$v){
                $articles[$k]['article'] = $this->where(array('id'=>$articles[$k]['aid']))->find();
                $articles[$k]['lids']= D('AlRelation')->getAidData($articles[$k]['aid']);
            }
        }
        $data = array(
            'articles'=>$articles,
            'tname'   =>$tname,
            'lname'   =>$lname,
            'page'    =>$page->show()
        );
        return $data;
    }
    public function articleOneData($id,$map=''){
        if ($map==""){
            $prev_map[]=array('is_show'=>1);
            $next_map=$prev_map;
            $prev_map['id']=array('gt',$id);
            $next_map['id']=array('lt',$id);
            $assign['prev'] = $this->field('id,title')->where($prev_map)->limit(1)->find();
            $assign['next'] = $this->field('id,title')->where($next_map)->limit(1)->order('id desc')->find();
        }else{
            if (isset($map['tid'])){
                $prev_map['tid']=$map['tid'];
                $prev_map[]=array('is_show'=>1);
                $next_map=$prev_map;
                $prev_map['id']=array('gt',$id);
                $next_map['id']=array('lt',$id);
                $assign['prev'] = $this->field('id,title')->where($prev_map)->limit(1)->find();
                $assign['next'] = $this->field('id,title')->where($next_map)->limit(1)->order('id desc')->find();
            }else if(isset($map['lid'])){
                $prev_map['lid']=array('gt',$map['lid']);
                $next_map['lid']=array('lt',$map['lid']);
                $prev_map_aid = M('AlRelation')->field('aid')->where($prev_map)->limit(1)->find();
                $next_map_aid = M('AlRelation')->field('aid')->where($next_map)->limit(1)->order('id desc')->find();
                $assign['prev'] = $this->field('id,title')->where(array('id'=>$prev_map_aid,'is_show'=>1))->limit(1)->find();
                $assign['next'] = $this->field('id,title')->where(array('id'=>$next_map_aid,'is_show'=>1))->limit(1)->find();
            }else if (isset($map['search'])){
                $prev_map=array('title'=>array('like','%'.$map['title'].'%'));
                $prev_map[]=array('is_show'=>1);
                $next_map=$prev_map;
                $prev_map['id']=array('gt',$id);
                $next_map['id']=array('lt',$id);
                $assign['prev']=$this->field('id,title')->where($prev_map)->limit(1)->find();
                $assign['next']=$this->field('id,title')->where($next_map)->order('aid desc')->limit(1)->find();
            }
        }
        $data = $this->where(array('id'=>$id))->find();
        $lids = D('AlRelation')->getAidData($data['id']);
        $assign['article'] = $data;
        $assign['libs'] = $lids;
        return $assign;
    }
    public function keywordSearchData($keyword){
           $where = array('title'=>array('like',"%{$keyword}%"));
            $count = $this->where($where)->count();
           $page = new Page($count,10);
           $articles = $this
            ->where($where)
            ->order('add_time desc')
            ->limit($page->firstRow.','.$page->listRows)
            ->select();
        foreach ($articles as $k=>$v){
            $articles[$k]['lids']= D('AlRelation')->getAidData($articles[$k]['id']);
        }
        $assign = array(
            'articles' =>$articles,
            'keyword'  =>$keyword,
            'page'     =>$page->show()
        );
        return $assign;
    }
}
