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
        if($useri instanceof SimpleUser){
            $query = $this -> database -> pdo -> prepare("INSERT INTO simpleuser (username) values (:username)");
            $query -> bindParam(":username", $username);
            $query -> execute();
        }
    }
    public function addAdmin($useri){
        if($useri instanceof Admin){
            $query = $this -> database -> pdo -> prepare("INSERT INTO admin (id) values (:id)");
            $query -> bindParam(":id", $id);
            $query -> execute();
        }
    }
    public function readUser($username){
        $query = $this -> database -> pdo -> prepare("SELECT * from useri where username = :username");
        $query -> bindParam(":username", $username);
        $query -> execute();
        return $query -> fetch();
    }
    public function update($request){
        if($_GET['roli'] == 0){
            $useri = new SimpleUser($request['emri'], $request['mbiemri'], $request['dataLindjes'], $request['gjinia'], $request['email'], $request['username'], "");
        }
        else if($_GET['roli'] == 1){
            $useri = new Admin($request['emri'], $request['mbiemri'], $request['dataLindjes'], $request['gjinia'], $request['email'], $request['username'], "");
        }
        $emri = $useri -> getEmri();
        $mbiemri = $useri -> getMbiemri();
        $dataLindjes = $useri -> getDataLindjes();
        $gjinia = $useri -> getGjinia();
        $email = $useri -> getEmail();
        $username = $useri -> getUsername();
        $roli = $useri -> getRole();
        $query = $this -> database -> pdo -> prepare("UPDATE useri 
                                                    set emri = :emri,
                                                    mbiemri = :mbiemri, 
                                                    dataLindjes = :dataLindjes, 
                                                    gjinia = :gjinia, 
                                                    email = :email,
                                                    username = :username, 
                                                    roli = :roli
                                                    WHERE username = :username");
        $query -> bindParam(":emri", $emri);
        $query -> bindParam(":mbiemri", $mbiemri);
        $query -> bindParam(":dataLindjes", $dataLindjes);
        $query -> bindParam(":gjinia", $gjinia);
        $query -> bindParam(":email", $email);
        $query -> bindParam(":username", $username);
        $query -> bindParam(":roli", $roli);
        $query -> execute();
    }
    public function delete($username){
        $query = $this -> database -> pdo -> prepare("DELETE from useri where username = :username");
        $query -> bindParam(":username", $username);
        $query -> execute();
    }
}
?>