<?php
namespace Api\Controller;
use Think\Controller;
use Think\Upload;

header('Access-Control-Allow-Origin:*');
class SgController extends Controller{
	public function index(){
		if (empty($_POST['station'])) resultJson('error','应聘岗位不能为空');
		if (empty($_POST['name'])) resultJson('error','姓名不能为空');
		if (empty($_POST['sex'])) resultJson('error','性别不能为空');
		if (empty($_POST['birth_time'])) resultJson('error','出生日期不能为空');
		if (empty($_POST['education'])) resultJson('error','学历不能为空');
		if (empty($_POST['graduation_time'])) resultJson('error','毕业时间不能为空');
		if (empty($_POST['pay'])) resultJson('error','期望薪资不能为空');
		if (empty($_POST['email'])) resultJson('error','邮箱不能为空');
		if (!preg_match("/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/",$_POST['email'])) resultJson('error','邮箱格式错误');
		if (empty($_POST['phone'])) resultJson('error','手机号不能为空');
		if (empty($_POST['my_appraise'])) resultJson('error','自我评价不能为空');
		if (empty($_POST['start_time1'])) resultJson('error','工作开始时间不能为空');
		if (empty($_POST['end_time1'])) resultJson('error','工作开始时间不能为空');
		if (empty($_POST['company1'])) resultJson('error','工作单位不能为空');
		if (empty($_POST['duty1'])) resultJson('error','工作职务不能为空');
		if (empty($_POST['photo'])) resultJson('error','请上传图片');

		//添加工作简历
		$workId = '';
		for ($i=1; $i < 4 ; $i++) { 
			if (!empty($_POST['start_time'.$i]) || !empty($_POST['end_time'.$i])) {
				$workIntro = array(
					'start_time'  => $_POST['start_time'.$i],
					'end_time'    => $_POST['end_time'.$i],
					'company'     => $_POST['company'.$i],
					'duty'        => $_POST['duty'.$i],
				);
				$id = M('sg_work')->add($workIntro); 
				$workId .= $id.',';
			}
		}

		$dir = "./Upload/sg/";
		$data = array(
			'photo'      => upload_base64_img_comm($_POST['photo'],$dir,$_POST['phone']),
			'station'    => $_POST['station'],
			'name'       => $_POST['name'],
			'sex'        => $_POST['sex'],
			'email'      => $_POST['email'],
			'birth_time' => $_POST['birth_time'],
			'education'  => $_POST['education'],
			'graduation_time'=> $_POST['graduation_time'],
			'pay'        => $_POST['pay'],
			'id_number'  => $_POST['id_number'],
			'phone'      => $_POST['phone'],
			'work_id'    => rtrim($workId,','),
			'my_appraise'=> $_POST['my_appraise'],
			'responsibility'=> $_POST[' responsibility']
		);
		$result = M('sg_mployment')->add($data);
		if ($result) {
			resultJson('ok','提交成功，苏格时代期待你的加入！');
		}else{
			resultJson('error','失败');
		}
	}	

	public function upload_img($myFile){
        //实例化上传类
        $upload = new \Think\Upload();
        //设置上传文件的大小
        $upload->maxSize = 2048000;
        //设置允许上传文件的扩展名
        $upload->exts = array("jpg", "gif","png");
        //是否生成子目录
        $upload->autoSub = true;
        //设置上传的根目录
        $upload->rootPath = "./";
        //设置保存的路径
        $upload->savePath = "Upload/sg/";
        //上传文件，返回：false、一维关联数组
        $result = $upload->uploadOne($myFile);
        if ($result){
            $savePath = ucfirst($result["savepath"]);
            $path = $savePath . $result["savename"];
			return $path;
        }else{
            echo "<script type=\"text/javascript\">alert('上传失败！');</script>";exit;
        }
	}
}