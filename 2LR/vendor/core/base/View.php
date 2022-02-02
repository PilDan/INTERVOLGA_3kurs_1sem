<?php


namespace vendor\core\base;


class View
{
    # текущий маршрут и параметры
    public $route = [];
    # текущий вид
    public $view;
    # текущий шаблон
    public $layout;

    public function __construct($route, $layout = '', $view = '' )
    {
        $this->route = $route;
        # если шаблон тоже равен false, то не запускаем шаблон
        if($layout === false)
        {
            $this->layout = false;
        }else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;

    }
    # подключаем вид и шаблон и определяем переменные которые пользователь передает
    public function render($vars)
    {
        # если перемен vars массив, извлекаем значения
        if(is_array($vars))
        {
            extract($vars);
        }
        # путь к тек виду
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        # буферизирует всё, что идет после нее /не выводя на экран/
        ob_start();
        # при существующем виде подключаем его
        if(is_file($file_view))
        {
            require $file_view;
        }else{
            echo "Не найден вид <b>{$file_view}</b>";
        }
        # записываем в переменную всё что есть в буффере
        $content = ob_get_clean();
        # если шаблон не равен false, подключаем его
        if($this->layout !== false)
        {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout))
            {
                require $file_layout;
            }else{
                echo "Не найден шаблон <b>{$file_layout}</b>";
            }
        }

    }
}