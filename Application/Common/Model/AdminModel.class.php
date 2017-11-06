<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/25 0025
 * Time: 16:20
 */
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 文章标签关联表model
 */
class AdminModel extends BaseModel{
    public function changePwd(){
        $old_pwd = sha1(md5(I('post.old_pwd')));
        $word = I('post.word');
        $problem = I('post.problem');
        $new_pwd1 = I('post.new_pwd1');
        $new_pwd2 = I('post.new_pwd2');
        $old_pwd2 = $_SESSION['ycblogyangchaohangadminpwd'];
      switch (true){
          case $old_pwd!==$old_pwd2:
              return '旧密码输入错误';
              break;
          case $word!=="天王盖地虎":
             return '口令错误';
             break;
          case $problem!=="杨航":
              return '问题回答错误';
              break;
          case $new_pwd1!==$new_pwd2:
              return '两次密码不一致';
              break;
      }
      $result = $this
          ->where(array('name'=>$_SESSION['ycblogyangchaohangadminname']))
          ->save(array('password'=>sha1(md5($new_pwd1))));
      if ($result){
          $_SESSION['ycblogyangchaohangadminpwd'] = sha1(md5($new_pwd1));
          return '修改成功';
      }else{
          return '修改失败';
      }
    }
}