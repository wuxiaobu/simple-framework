<?php

namespace core;

class base{
	static $classMap = [];
	public $assign;

	static public function run(){
		$route = new \core\lib\route();
		$ctrl = $route->ctrl;
		$action = $route->action;
		$ctrlFile = APP.'/controller/'.$ctrl.'Controller.php';
		if(is_file($ctrlFile)){
			$classNmae = '\\'.MODULE.'\controller\\'.$ctrl.'Controller';
			include $ctrlFile;
		    $ctrl = new $classNmae();
		    $ctrl->$action();
		} else {
			throw new \Exception('找不到控制器'.$ctrl);
		}
		//ddd($route);
	}

	//自动加载类库
	static public function load($class){
		if(isset($classMap[$class])){
			return true;
		} else {
			$class = str_replace('\\', '/', $class);
			$file = BASE_PATH.'/'.$class.'.php';
			if(is_file($file)){
				include $file;
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}
	}

	public function assign($name,$value){
		$this->assign[$name] = $value;
	}

	public function display($file){
		$file = APP.'/view/'.$file;
		if(is_file($file)){
			extract($this->assign);
			include $file;
		}
	}
}