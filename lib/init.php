<?php

spl_autoload_register(function ($class_name) {
    $lib_path = ROOT . DS . 'lib' . DS . strtolower($class_name) . '.class.php';
    $controller_path = ROOT . DS . 'controllers' . DS . str_replace('controller', '', strtolower($class_name)) . '.controller.php';
    $model_path = ROOT . DS . 'models' . DS . strtolower($class_name) . '.php';

    if (file_exists($lib_path)) {
        require_once($lib_path);
    } elseif (file_exists($controller_path)) {
        require_once($controller_path);
    } elseif (file_exists($model_path)) {
        require_once($model_path);
    } else {
        echo "404";
//        throw new Exception("failed to include class named:" . $class_name);
    }


});
require_once(ROOT . DS . 'config' . DS . 'config.php');


function __($key, $default_value = ''){
    return   Lang::get($key, $default_value);
}