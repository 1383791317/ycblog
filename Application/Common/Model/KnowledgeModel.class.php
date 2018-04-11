<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/6 0006
 * Time: 12:52
 */
namespace Common\Model;
use Common\Model\BaseModel;
class KnowledgeModel extends BaseModel{
    protected $_validate=array(
        array('title','require','文章标题必填'),
        array('author','require','文章作者必填'),
        array('keyword','require','关键字必填'),
        array('content','require','文章内容必填')
    );
    public function knowAdd(){
        $data=$_POST;
        $knowledge_name = C('WEB_K_ARR');
        $data['content'] = htmlspecialchars_decode($data['content']);
        $data['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title="'. $data['author'].'的'.$knowledge_name['name'].'"',$data['content']);
        $data['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt="'. $data['author'].'的'.$knowledge_name['name'].'"',$data['content']);
        if (get_ueditor_image_path($data['content'])){
            $image = messageUploadImage($data['content']);
            $data['image'] = implode(';',$image);
            $data['content']=preg_replace('/src=\"\/Upload\/ueditor/','src="'.C('UPLOAD_IMG_URL'),$data['content']);
        }
        if ($this->create($data)){
            if (empty($data['description'])){
                $data['description']=subText(strip_tags($data['content']),85);
            }
            if ($this->add($data)){
                return '添加成功';
            }else{
                return '添加失败';
            }
        }else{
            return '信息不完善';
        }
    }
    public function selectData(){
        $kid = $_GET['kid'];
        $search =  $_GET['keywords'];
        if (!empty($kid)){
            $data = $this->where(array('kid'=>$kid))->find();
            $assgin = array(
                'knowledge'=>$data,
            );
        }else if (!empty($search)){
            $where = array('title'=>array('like','%'.$search.'%'));
            $data = $this->where($where)->select();
            $assgin = array(
                'knowledge'=>$data,
                'tname'=>C('WEB_K_ARR')
            );
        }else if (empty($kid)){
            $data = $this->order("add_time desc")->select();
            $count = $this->count();
            $assgin = array(
                'knowledge'=>$data,
                'count'=>$count,
                'tname'=>C('WEB_K_ARR')
            );
        }
        return $assgin;
    }
    public function changeKnowledge(){
        $new_data = I('post.');
        $kid = $new_data['kid'];
        $content = M('Knowledge')
            ->where("kid={$kid}")
            ->getField('content');
        $image = get_ueditor_image_path_bendi($content);
        $new_data['content'] = htmlspecialchars_decode($new_data['content']);
        //更改编辑器图片的title和alt
        $new_data['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title="'. $new_data['author'].'的文章"',$new_data['content']);
        $new_data['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt="'. $new_data['author'].'的文章"',$new_data['content']);
        $new_image =  messageUploadImage($new_data['content']);
        if (!empty($image)&&!empty($new_image)){
            $img_result =  array_merge(array_diff($image,$new_image),array_diff($image,$new_image));
            if ($img_result){
                foreach ($img_result as $v){
                    unlink('.'.$v);
                }
            }
        }
        if (!empty($new_image)){
            $new_data['image'] = $new_image[0];
        }else{
            $new_data['image']='';
        }
        // 转义
        $new_data['content']=preg_replace('/src=\"\/Upload\/ueditor/','src="'.C('UPLOAD_IMG_URL'),$new_data['content']);
        if ($this->create($new_data)){
            if (empty($new_data['description'])){
                $new_data['description']=subText(strip_tags($new_data['content']),85);
            }
            $result = $this->where(array('kid'=>$kid))->save($new_data);
            if ($result){
                return '修改成功';
            }else{
                return '修改失败';
            }
        }else{
            return '请提交完善信息！';
        }
    }
    public function deleteData(){
        $kid = I('get.kid');
        $image = $this->where(array('kid'=>$kid))->find();
        if ($image){
            $img = explode(';',$image);
            foreach ($img as $v){unlink($v);};
        }
        $result = $this->where(array('kid'=>$kid))->delete();
        return $result;
    }
}