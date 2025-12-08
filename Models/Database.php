<?php 
class Database{
    private $host ;
    private $user ;
    private $pass ;
    private $dbname ;
    private $port ;
    private $connection;

    public function __construct($host, $user, $pass, $dbname, $port = '3306'){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->port = $port;
    } 
    public function connect(){
        try{
            $this->connection = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->user, $this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
    public function disconnect(){
        if($this->connection != null){
            $this->connection = null;
            return $this->connection;
        }

    }  
}
?>