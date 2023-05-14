<?php

$protocol = (isset($_SERVER['HTTPS'])) ? "https" : 'http';
$url = (explode('/', $_SERVER['REQUEST_URI']));
$root = $_SERVER['SERVER_NAME'] . '/' . $url[1] .'/';
define('ROOT_PATH', $protocol . '://' . $root);
define('ROOT_ADMIN', ROOT_PATH . "admin/assets");

define('ADMIN_TEMPLATES', __DIR__ . '\admin\templates\\');
define('ADMIN_ASSETS', ROOT_PATH . '/admin/assets/');
define('ADMIN_ROOT', ROOT_PATH . 'admin/');

define('DIR_ROOT', __DIR__ .'\\');