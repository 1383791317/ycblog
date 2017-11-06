<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 文章标签关联表model
 */
class AlRelationModel extends BaseModel{


    public function addData($aid,$lids){
        foreach ($lids as $k => $v) {
            $tag_data=array(
                'aid'=>$aid,
                'lid'=>$v,
            );
           $this->add($tag_data);
        }
        return true;
    }
    public function deleteData($aid){
        $this->where(array('aid'=>$aid))->delete();
        return true;
    }
    public function getAidData($aid){
        $data = $this->alias('a')->join('yc_article_label as b on a.lid = b.lid')->where(array('aid'=>$aid))->select();
        return $data;
    }

}




