<?php

namespace app\controller;

use core\lib\conf;
use core\lib\model;

class indexController extends \core\base{
	public function index(){
		//$db = new model();
		//ddd(conf::config('database'));
		$data = 23423;
		$d = 'dafafa';
		$model = new \core\lib\model();
		$this->assign('data',$data);
		$this->assign('d',$d);
		$this->display('index.html');
	}
}