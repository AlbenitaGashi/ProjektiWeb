<?php 
require_once 'C:\xampp\htdocs\ProjektiWeb\config\Database.php';
class ContactController{
    public $database;
    public function __construct(){
       $this -> database = new Database;
    }
    public function readData(){
        $query = $this -> database ->pdo->query('SELECT * FROM contacts');
        return $query -> fetchAll();
    }
    public function insert($request){
        $query = $this->database->pdo->prepare('INSERT INTO contacts (emri, mbiemri, email, message) VALUES (:emri, :mbiemri, :email, :message)');
        $query->bindParam(':emri', $request['emri']);
        $query->bindParam(':mbiemri', $request['mbiemri']);
        $query->bindParam(':email', $request['email']);
        $query->bindParam(':message', $request['message']);
        $query->execute();
    }
    public function delete($id){
        $query = $this->database->pdo->prepare('DELETE from contacts WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        return header("Location: menuDashboard.php");
    }
}
?>