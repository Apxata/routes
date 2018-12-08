<?php
define('_ROOT_DIR', getcwd());
define('_CFG_DIR', _ROOT_DIR . '/admin/');
define('_MODULES', _ROOT_DIR . '/modules/');
define('_HEADER', _CFG_DIR . '/header/');

require_once(_MODULES . '/smarty/Smarty.php');
require_once(_MODULES . '/smarty/Smarty_Autoloader.php');
//require_once(_CFG_DIR . 'cfg/db_cfg.php');

// Autoload class definitions
//spl_autoload_register('my_autoload');
//function my_autoload($className)
//{
////    if (preg_match('/\A\w+\Z/', $class)) {
////        if(file_exists($class . '.php')){
////            include('modules/' . $class . '.php');
////        }elseif(file_exists($class . '.php')){
////            include('modules/smarty' . $class . '.php');
////        }
////    }
//    $fileName = $className . '.php';
//    include  ('modules/' . $fileName);
//}

require_once(_CFG_DIR . 'cfg/db_cfg.php');
require_once(_MODULES . 'DB.php');
require_once(_MODULES . 'article.php');
require_once(_MODULES . 'Pagination.php');
require_once(_MODULES . 'Parsedown.php');
require_once(_MODULES . 'Comment.php');

$connect = DB::get_connect();

//require_once(_MODULES . 'smarty/Smarty.php');



