<?php

define('PathPrefix', '/controllers/');
define('PathPostfix', 'Controller.php');

$template = 'default';

define('TemplatePrefix', "views/{$template}/");
define('TemplatePostfix', '.tpl');
define('TemplateWebPath', "templates/{$template}/");

require 'libraly/Smarty/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->setTemplateDir(TemplatePrefix);
$smarty->SetCompileDir('/tmp/smarty/templates_c');
$smarty->setCacheDir('/tmp/smarty/cache');
$smarty->setConfigDir('/libraly/Smarty/configs');

$smarty->assign('TemplateWebPath', TemplateWebPath);

class Connect{
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_NAME = 'protest14';
	const DB_HOST = 'localhost';
	private static $connection = null;
	public static function getInstance() {
		if(self::$connection === null) {
			self::$connection = mysqli_connect('localhost', 'root', '');
			mysqli_query(self::$connection,"SET NAMES utf8");
   			mysqli_select_db(self::$connection, 'protest14'); 
   			mysqli_set_charset (self::$connection, 'utf8'); 
		}
		return self::$connection;
	}
}

$connection = Connect::getInstance();

