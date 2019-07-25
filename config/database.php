<?php
class Database{
    private $host = "localhost";
    private $db_name= "php_opp_crud";
    private $username="rubeus77";
    private $password="rubeus77";

    public $conn;

    public function getConnection(){
        $this->conn=null;
        try{
            $this->conn= new PDO("mysql:host=" . $this->host . ";dbname=".$this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Błąd połączenia z bazą: ". $exception->getMessage();
        }
        return $this->conn;
    }
}
?>