<?php 
require_once 'C:\xampp\htdocs\ProjektiWeb\config\Database.php';
include "Contacts.php";
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
        $userContact = new Contacts($request['emri'], $request['mbiemri'], $request['email'],  $request['message']);
        $emri = $userContact -> getEmri();
        $mbiemri = $userContact -> getMbiemri();
        $email = $userContact -> getEmail();
        $message = $userContact -> getMessage();
        $query = $this->database->pdo->prepare('INSERT INTO contacts (emri, mbiemri, email, message) VALUES (:emri, :mbiemri, :email, :message)');
        $query->bindParam(':emri', $emri);
        $query->bindParam(':mbiemri', $mbiemri);
        $query->bindParam(':email', $email);
        $query->bindParam(':message', $message);
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