<?php


namespace vendor\core\base;

use vendor\core\Db;


abstract class Model
{
    # подключение к бд
    protected $pdo;
    # имя таблицы модели
    protected $table;
    # первичный ключ
    protected $pk = 'id';

    public function __construct()
    {
        $this->pdo = Db::instance();
    }
    # выполняем sql запрос/ возвращает true or false
    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }
    # возвращает все данные из таблицы
    public function findAll()
    {
        $sql = "SELECT * FROM ($this->table)";
        return $this->pdo->query($sql);
    }
    # возвращает одну строку данные из таблицы
    public function findOne($valueWhereOrId, $column = '')
    {
        $column = $column ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $column = ? LIMIT 1";
        return $this->pdo->query($sql, [$valueWhereOrId])[0]; // возвращает массив с одним элементом
    }
    # поиск по запросу SQL
    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }
    # поиск данных по столбцу и строке
    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM {$this->table} WHERE {$field} LIKE ?";
        return $this->pdo->query($sql, ['%' . $str . '%']);
    }
    # занесение данных в таблицу
    public function add($data)
    {
        $fields = implode(', ', array_keys($data));
        $values = '\'' . implode('\', \'', array_values($data)) . '\'';
        $sql = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
        $this->pdo->execute($sql);
    }
    # обновление данных в таблице
    public function updateBy($fieldWhere, $valueWhere, $data)
    {
        $str = [];
        foreach ($data as $column => $value)
        {
            $str[] = $column . ' = \'' . $value . '\'';
        }
        $str = implode(',',$str);
        $sql = "UPDATE {$this->table} SET {$str} WHERE {$fieldWhere} = {$valueWhere}";
        $this->pdo->execute($sql);
    }
    # удаление данных в таблице
    public function deleteBy($fieldWhere, $valueWhere)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$fieldWhere} = {$valueWhere}";
        $this->pdo->execute($sql);
    }
}