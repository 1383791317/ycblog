<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 16:51
 */
namespace Common\Model;
use Common\Model\BaseModel;
class ArticleModel extends BaseModel{
    //ThinkPHP自动验证
    protected $_validate=array(
        array('tid','require','必选分类'),
        array('title','require','文章标题必填'),
        array('author','require','文章作者必填'),
        array('content','require','文章内容必填')
    );
    public function addData(){
        $data = $_POST;
        $data['content'] = htmlspecialchars_decode($data['content']);
        //更改编辑器图片的title和alt
        $data['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title="'. $data['author'].'的文章"',$data['content']);
        $data['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt="'. $data['author'].'的文章"',$data['content']);
        $chaneImg =  messageUploadImage($data['content']);

            if (!empty($chaneImg)){
                $data['image'] = $chaneImg[0];
            }
        $data['content']=preg_replace('/src=\"\/Upload\/ueditor/','src="'.C('UPLOAD_IMG_URL'),$data['content']);
        // 转义
        if ($this->create($data)&&!empty($data['lids'])){
            if (empty($data['description'])){
                $data['description']=subText(strip_tags($data['content']),350);
            }
            if ($aid = $this->add($data)){
            $label =  D('AlRelation')->addData($aid,$data['lids']);
               if ($label){
                    return '上传成功';exit;
                }else{
                    return '上传失败';exit;
                }
            }else{
                return '标签添加失败';exit;
            }
        }else{
            return '请完善文章信息！';exit;
        }
    }
    public function delData(){
        $id = I('get.id');
        if (!empty($id)){
                $content = M('Article')
                    ->where("id={$id}")
                    ->getField('content');
            $image = get_ueditor_image_path_bendi($content);
            if (!empty($image)){
                foreach ($image as $v){
                   if (!unlink('.'.$v)){return returnApiMessage('error','删除图片失败');}
                }
            }
            D('AlRelation')->deleteData($id);
            $result = M('Article')
                ->where("id={$id}")
                ->delete();
            if ($result){
                return returnApiMessage('success','删除成功');
            }else{
                return returnApiMessage('error','删除数据失败');
            }
        }else{
            return returnApiMessage('error','请选择要删除的信息');
        }
    }
    //修改数据
    public function changeData(){
        $new_data = I('post.');
        $id = $new_data['id'];
        $content = M('Article')
            ->where("id={$id}")
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
        if ($this->create($new_data)&&!empty($new_data['lids'])){
            if (empty($new_data['description'])){
                $new_data['description']=subText(strip_tags($new_data['content']),350);
            }
            $result = $this->where(array('id'=>$id))->save($new_data);
            if ($result){
                D('AlRelation')->deleteData($id);
                D('AlRelation')->addData($id,$new_data['lids']);
                return '修改成功';
            }else{
                return '修改失败';
            }
        }else{
            return '请完善文章信息！';exit;
        }
    }
}