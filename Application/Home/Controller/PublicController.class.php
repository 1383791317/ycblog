<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
use Think\Controller;
class PublicController extends HomeBaseController{
	public function error(){
		$this->display();
	}
}