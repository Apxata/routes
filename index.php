<?php
require_once('admin/cfg/loader.php' );

$url = substr($_SERVER['REQUEST_URI'], 1);
$url = rtrim($url, '/');
$url = explode('/', $url);

//echo "<br>";
//echo "url0 :" . $url[0] . "</br>";
//echo "url1 :" . $url[1] . "</br>";
//echo "url2 :" . $url[2] . "</br>";
//die();

require 'controllers/' . $url[0] . '.php';
$controller = new $url[0];
if (isset($url[2])) {
    $controller->$url[1]($url[2]);
} else {
    if (isset($url[1])) {
        $controller->$url[1]();
    }
}

