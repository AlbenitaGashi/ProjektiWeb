<?php
require_once 'C:\xampp\htdocs\ProjektiWeb\config\Database.php';
include 'useri.php';
class UserController{
    public $database;
    public function __construct(){
        $this -> database = new Database;
    }
    public function readData(){
        $query = $this -> database -> pdo -> query("SELECT * from useri");
        return $query -> fetchAll();
    }
    public function insert($request){
        $useri = new SimpleUser($request['emri'], $request['mbiemri'], $request['dataLindjes'], $request['gjinia'], $request['email'], $request['username'], $request['password']);
        $emri = $useri -> getEmri();
        $mbiemri = $useri -> getMbiemri();
        $dataLindjes = $useri -> getDataLindjes();
        $gjinia = $useri -> getGjinia();
        $email = $useri -> getEmail();
        $username = $useri -> getUsername();
        $password = $useri -> getPassword();
        $roli = $useri -> getRole();
        $query = $this -> database -> pdo -> prepare("INSERT INTO useri (emri, mbiemri, dataLindjes, gjinia, email, username, password, roli) values(:emri, :mbiemri, :dataLindjes, :gjinia, :email, :username, :password), :roli");
        $query -> bindParam(":emri", $emri);
        $query -> bindParam(":mbiemri", $mbiemri);
        $query -> bindParam(":dataLindjes", $dataLindjes);
        $query -> bindParam(":gjinia", $gjinia);
        $query -> bindParam(":email", $email);
        $query -> bindParam(":username", $username);
        $query -> bindParam(":password", $password);
        $query -> bindParam(":roli", $roli);
        $query -> execute();
        /* if($useri instanceof Admin){
            $query = $this -> database -> pdo -> prepare("INSERT INTO admin (id) values (:id)");
            $query -> bindParam(":id", $id);
            $query -> execute();
        } */
        if($useri instanceof SimpleUser){
            $query = $this -> database -> pdo -> prepare("INSERT INTO simpleuser (username) values (:username)");
            $query -> bindParam(":username", $username);
            $query -> execute();
        }
    }
}
?>