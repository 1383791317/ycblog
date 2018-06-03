<?php
namespace Api\Controller;
use Common\Controller\HomeBaseController;

class CommentController extends HomeBaseController
{
	public function _initialize()
	{
		protected $userinfo;
		$userInfo = session('ycblog1224userinfo');
		if ($userInfo) {
			$user = M('member')->where(array('user_id'=>$userInfo['user_id']))->find();
			if (!$user) {
				returnApiMessage('error','身份信息错误');
			}
			$this->userinfo = $user;
		}else{
			returnApiMessage('error','请登录再操作');
		}
	}
	//用户评论文章
	public function comment()
	{
		
	}
}