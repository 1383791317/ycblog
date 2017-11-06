<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Common\Controller\HomeBaseController;
use Think\Controller;
class IndexController extends HomeBaseController{
    public function index(){
        $articles = D('ArticleView')->articleData();
        $this->assign($articles);
        $this->display();
    }
    public function category(){
        $tid = I('get.tid');
        $articles = D('ArticleView')->articleData($tid);
        if (empty($articles['tname'])){
            header("HTTP/1.0  404  Not Found");
            $this->display('./Template/default/Home/Public/404.html');
            exit(0);
        }
        cookie('tid',$tid);
        cookie('lid',null);
        cookie('search_word',null);
        $this->assign($articles);
        $this->display();
    }
    public function article(){
        $aid = I('get.aid');
        $lid=intval(cookie('lid'));
        $tid=intval(cookie('tid'));
        $search_word=cookie('search_word');
        $search_word=empty($search_word) ? 0 : $search_word;
        $read=cookie('read');
        // 判断是否已经记录过aid
        if (isset($read[$aid])) {
            // 判断点击本篇文章的时间是否已经超过一天
            if ($read[$aid]-time()>=86400) {
                $read[$aid]=time();
                // 文章点击量+1
                M('Article')->where(array('id'=>$aid))->setInc('click',1);
            }
        }else{
            $read[$aid]=time();
            // 文章点击量+1
            M('Article')->where(array('id'=>$aid))->setInc('click',1);
        }
        cookie('read',$read,864000);
        switch(true){
            case $lid==0 && $tid==0 && $search_word==(string)0:
                $map=array();
                break;
            case $lid!=0:
                $map=array('lid'=>$lid);
                break;
            case $tid!=0:
                $map=array('tid'=>$tid);
                break;
            case $search_word!==0:
                $map=array('title'=>$search_word);
                break;
        }
        $result = D('ArticleView')->articleOneData($aid,$map);
        if (empty($result['article'])){
            header("HTTP/1.0  404  Not Found");
            $this->display('./Template/default/Home/Public/404.html');
            exit(0);
        }
        $this->assign($result);
        $this->display();
    }
    public function label(){
        $lid = I('get.lid');
        $articles = D('ArticleView')->articleData('all',$lid);
        if (empty($articles['lname'])){
            header("HTTP/1.0  404  Not Found");
            $this->display('./Template/default/Home/Public/404.html');
            exit(0);
        }
        cookie('tid',null);
        cookie('lid',$lid);
        cookie('search_word',null);
        $this->assign($articles);
        $this->display();
    }
    public function search(){
        $keywords = I('get.keywords');
        $assign = D('ArticleView')->keywordSearchData($keywords);
        cookie('tid',null);
        cookie('lid',null);
        cookie('search_word',$keywords);
        $this->assign($assign);
        $this->display();
    }
}