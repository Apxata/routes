<?php
require_once('admin/cfg/loader.php' );

$url = substr($_SERVER['REQUEST_URI'], 1);
$url = rtrim($url, '/');
$url = explode('/', $url);

require 'controllers/' . $url[0] . '.php';
$controller = new $url[0];
if (isset($url[2])) {
    $controller->$url[1]($url[2]);
} else {
    if (isset($url[1])) {
        $controller->$url[1]();
    }
}

