<?php


namespace vendor\core;



class Router
{
    #routes массив маршрутов, route текущий маршрут
    protected static $routes = [];
    protected static $route = [];
    # добавление маршрута
    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }
    # функции получения всех маршрутов и текущего маршрута
    public static function getRoutes()
    {
        return self::$routes;
    }
    public static function getRoute()
    {
        return self::$route;
    }
    # перебираем маршруты и получаем отдельно паттерн и маршрут, если найден существующий, то переходи м на него
    public static function matchRoute($url)
    {
        /** перебираем таблицу маршрутов и получаем из нее регулярное выражение (pattern) и маршрут (route),
         * который соответствует этому регулярному выражению */
        foreach (self::$routes as $pattern => $route)
        {
            # используем ограничители шаблона
            $pattern = "#${pattern}#";
            # если запрос существует возвращаем true, в противном случае - false
            if(preg_match($pattern, $url,$matches))
            {
                foreach ($matches as $k => $v)
                {
                    if(is_string($k))
                    {
                        $route[$k] = $v;
                    }
                }
                if(!isset($route['action']))
                {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    /** При отработке функции matchRoute перенаправляет URL по конкретному маршруту, а противном случае
     * перенаправляет на страницу 404 **/
    public static function despatch($url)
    {
        $url = self::removeQueryString($url);
        if(self::matchRoute($url))
        {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';
            # проверяем существования контроллера
            if(class_exists($controller))
            {
                # создаем объект текущего контроллера
                $cObj =new $controller(self::$route);
                # вызываем только методы с Action
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                # проверяем существует ли такой метод у контроллера
                if(method_exists($cObj, $action))
                {
                    $cObj->$action();
                    $cObj->getView();
                }else{
                    echo "<b>$controller::$action</b> ne naiden action";
                }
            }else{
                echo "<b>$controller</b> ne naiden controller";
            }
        }else{
            http_response_code(404);
            include '404.html';
        }
    }

    /** форматируем запрос
     * заменяем тире пробелом, делаем слова с большой буквы, удаляет пробел*
     * @param $name
     */
    protected static function upperCamelCase($name)
    {
        $name = str_replace('-',' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ','', $name);
        return $name;
    }
    /** форматируем запрос
     * заменяем тире пробелом, делаем слова с маленькой буквы, удаляет пробел*
     * @param $name
     */
    protected static function lowerCamelCase($name)
    {
        $name = str_replace('-',' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ','', $name);
        return lcfirst($name);
    }
    # обрезает возможные ГЕТ параметры
    protected  static function removeQueryString($url)
    {
        if($url)
        {
            $params = explode('&', $url, 2);
            if(false == strpos($params[0], '='))
            {
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }
}