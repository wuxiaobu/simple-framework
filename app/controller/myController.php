<?php

namespace app\controller;

class myController extends \core\base{
	public function index(){
		$data = 23423;
		$d = 'dafafa';
		$model = new \core\lib\model();
		ddd($model);
		$this->assign('data',$data);
		$this->assign('d',$d);
		$this->display('index.html');
	}
}