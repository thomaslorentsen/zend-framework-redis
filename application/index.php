<?php
defined('APPLICATION_PATH') ||
    define('APPLICATION_PATH', realpath(dirname(__FILE__) . ''));

set_include_path(implode(PATH_SEPARATOR, array(
    get_include_path(),
    APPLICATION_PATH,
    APPLICATION_PATH . '/library/',
    realpath(APPLICATION_PATH . '/vendor/zwilias/zend-framework-1/src/')
)));

require 'vendor/autoload.php';
require_once 'Zend/Loader/Autoloader.php';

$application = new Zend_Application('development', APPLICATION_PATH . '/config/application.ini');
$application->bootstrap()->run();
