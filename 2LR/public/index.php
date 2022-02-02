<?php

use vendor\core\Router;
# запрос пользователя
$query = rtrim($_SERVER['QUERY_STRING'],'/');
# константы для удобства
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default');


require '../vendor/libs/functions.php';

# функция автозагрузки страниц сс помощью класса контроллера
spl_autoload_register(function ($class)
{
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file))
    {
        require_once $file;
    }
});
# правила подключения
Router::add('^$', ['controller' =>'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::despatch($query);
