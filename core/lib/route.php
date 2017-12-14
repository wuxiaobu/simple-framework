<?php

namespace core\lib;

class route{

	public $ctrl;
	public $action;

	function __construct(){
		/**
		 * 1.隐藏index.php
		 * 2.获取url部分
		 * 3.返回对应控制器和方法
		 */
		$pathArr = [];
		if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' ){
			$path = $_SERVER['REQUEST_URI'];
			$pathArr = explode('/', trim($path,'/'));
			if(isset($pathArr[0])){
				$this->ctrl = $pathArr[0];
			} else {
				$this->ctrl = 'index';
			}
			if(isset($pathArr[1])) {
				$this->action = $pathArr[1];
			} else {
				$this->action = 'index';
			}
		} else {
			$this->ctrl = 'index';
			$this->action = 'index';
		}

		//url 参数
		$count = count($pathArr) + 2;
		$i = 2;
		while($i < $count){
			if(isset($pathArr[$i+1])){
				$_GET[$pathArr[$i]] = $pathArr[$i+1];
			}
			$i += 2;
		}
	}
}