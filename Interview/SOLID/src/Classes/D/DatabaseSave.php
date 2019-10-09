<?php


namespace App\D;


/**
 * Class DatabaseSave
 * @package App\O
 */
class DatabaseSave implements ISaver
{
    private $mysqli, $host, $user, $pass, $db;

    /**
     * DatabaseSave constructor.
     * @param $host
     * @param $user
     * @param $pass
     * @param $db
     */
    public function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function connect()
    {
        $this->mysqli = \mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );
        if ($this->mysqli->connect_error) {
            die(
                'Connection error (' .
                $this->mysqli->connect_errno . ')' .
                $this->mysqli->connect_error
            );
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data)
    {
        $this->connect();
        $this->mysqli->query("INSERT INTO 'reports' (report) VALUES ('" . $data . "')");
    }
}