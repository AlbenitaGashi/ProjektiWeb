<?php 
class Database{
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'astertech';
    public $pdo;
    public function __construct(){
        try{
            session_start();
            $conn = new PDO("mysql:host=$this->server;dbname=$this->database",$this->username,$this->password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this -> pdo = $conn;
        }
        catch(PDOException $e){
            echo "Database Connection Failed".$e->getMessage();
        }
    }
}
?>