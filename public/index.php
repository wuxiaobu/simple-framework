<?php
  /**
   * 入口文件
   * 1.定义常量
   * 2.加载函数
   * 3.启动框架
   */
  include 'define.php';
  include BASE_PATH.'/vendor/autoload.php';

  if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
  	ini_set('display_errors','On');
  } else {
  	ini_set('display_errors','Off');
  }

  include(CORE.'/common/function.php');
  include(CORE.'/base.php');

  spl_autoload_register('\core\base::load');
  \core\base::run();
