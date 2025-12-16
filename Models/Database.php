<?php

class Database
{
    private $db_host;

    private $db_user;

    private $db_name;

    private $db_port;

    private $db_pass;

    private $connection;

    public function __construct($db_host, $db_user, $db_pass, $db_name, $db_port)
    {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
        $this->db_port = $db_port;
    }

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;port=$this->db_port;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Kết nối DB thành công";
            return $this->connection;
        } catch (Exception $e) {
            echo "Kết nối không thành công: " . $e->getMessage() . " ở file:" . $e->getLine() . " tại dòng:" . $e->getFile();
            return null;
        }
    }

    public function disconnect()
    {
        $this->connection = null;
    }
}