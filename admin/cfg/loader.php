<?php
define('_ROOT_DIR', getcwd());
define('_CFG_DIR', getcwd() . '/admin/');
define('_MODULES', getcwd() . '/modules/');


// Autoload class definitions
function my_autoload($class)
{
    if (preg_match('/\A\w+\Z/', $class)) {
        if(file_exists($class . '.php')){
            include('modules/' . $class . '.php');
        }elseif(file_exists($class . '.php')){
            include('modules/smarty' . $class . '.php');
        }
    }
}

spl_autoload_register('my_autoload');


require_once(_CFG_DIR . 'cfg/db_cfg.php');
require_once(_MODULES . 'Db.php');
require_once(_MODULES . 'Article.php');
require_once(_MODULES . 'Pagination.php');
require_once(_MODULES . 'Parsedown.php');
require_once(_MODULES . 'Comment.php');
require_once(_MODULES . '/smarty/Smarty.php');

//require_once(_MODULES . 'smarty/Smarty.php');

$connect = DB::get_connect();

