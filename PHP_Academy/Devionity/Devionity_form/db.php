<?php

/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 20.09.2016
 * Time: 17:56
 */
class DB {
    
    protected $connection;

    public function __construct($host, $user, $password, $db_name) {
        $this->connection = new mysqli($host, $user, $password, $db_name);

        $this->query("SET NAMES UTF8");

        if (!$this->connection) {
            throw new Exception('Could not connected to DB');
        }
    }

    public function query($sql) {

        if(!$this->connection) {
            return false;
        }

        $result = $this->connection->query($sql); // ЭТО ВООБЩЕ КАК?
        if (mysqli_error($this->connection)) {
            throw new Exception (mysqli_error($this->connection));
        }

        if (is_bool($result)) {
            return $result;
        }

        $data = array();

        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        // освобождает память от результатов запроса
        mysqli_free_result($result);

        return $data;
    }

    public function escape($str) {
        // функция для экранирования спецсимволов в строке $str для использования в SQL выражениях
        // $this->connection, этот параметр задаем только в процедурном стиле, это идентификатор соединения.
        return mysqli_escape_string($this->connection,$str);
    }

}