<?php


namespace vendor\core;


use http\Params;
# подключение к бд
class Db
{
    # указатель на открытое подключение к серверу бд
    protected $pdo;
    # переменная для проверки
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        # настройки подключения
        $db = require ROOT . '/config/config_db.php';

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        # передаем настройки подключения
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }
    # проверка подключения, если в объекте ничего нет - создаем объект этого класса
    public static function instance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    # выполняет Sql запрос без данных из базы| return true or false
    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        # подготовка запроса
        $stmt = $this->pdo->prepare($sql);
        # выполнение запроса
        return $stmt->execute($params);
    }
    # выполняет Sql запрос, возвращает данные из базы
    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        # если есть данные - возвращаем
        if($res !== false)
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return  [];
    }
}