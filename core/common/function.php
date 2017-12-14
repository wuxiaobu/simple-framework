<?php
function ddd($var){
    if(is_bool($var)){
        var_dump($var);
    }elseif(is_null($var)){
        var_dump(null);
    }else{
        echo "<pre style='position:relative;z-index:999;padding:10px;border-radius:5px;background:#ccc;border:1px solid #aaa;font-zize:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
    }
    die();
}

function dd($value)
{
	echo "<pre>";
	print_r($value);
	die();
}

/**
 * PDO 连接参数
 *
 */
function pdo_connect($dbConfig)
{
    $result['status'] = false;

    $dsn = "mysql:dbname={$dbConfig['dbname']};host={$dbConfig['host']}";
    try {
        $dbh = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
    } catch (PDOException $e) {
        $result['msg'] =  'Connection failed: ' . $e->getMessage();
        return $result;
    }

    $dbh->prepare("SET NAMES utf8;")->execute();
    $result['status'] = true;
    $result['dbh'] = $dbh;
    return $result;
}