<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27 0027
 * Time: 14:27
 */
namespace Common\Model;
use Common\Model\BaseModel;
class UserModel extends BaseModel{
    function addData($data){
        $id = $this->add($data);
        return $id;
    }
    function editData($new_data){
        $appid = $new_data['openid'];
        $new_data['login_times']=array('exp','login_times+1');
        return  $this->where(array('appid'=>$appid))->save($new_data);
    }
    function getDataByOpenid($openid){
        return $this->where(array('openid'=>$openid))->find();
    }
}