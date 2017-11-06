<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/14 0014
 * Time: 12:00
 */
namespace Common\Controller;
class HomeBaseController extends BaseController{
    /**
     * 初始化方法
     */
    public function _initialize(){
        parent::_initialize();
        if(C('WEB_STATUS')!=1){
            $this->display('Public/web_close');
            exit();
        }
        $link = M('Link')->select();
        $articleType = M('ArticleType')->select();
        $articleLabel = M('ArticleLabel')->select();
        $assign = array(
          'articleType'=>$articleType,
            'articleLabel'=>$articleLabel,
            'link'=>$link,
        );
        $this->assign($assign);
    }
}