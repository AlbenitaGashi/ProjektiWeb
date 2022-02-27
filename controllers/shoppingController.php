<?php
require_once './config/Database.php';
class ShoppingController
{
    public $database;
    public function __construct()
    {
        $this->database = new Database;
    }
    public function readData()
    {
        $query = $this->database->pdo->query('SELECT * from shopping');
        return $query->fetchAll();
    }
    public function insert($request, $kodiProd, $cmimi)
    {
        $query = $this->database->pdo->prepare('INSERT INTO shopping (username, emri, mbiemri, adresa, qyteti, kodipostal, numriTel, kodiProd, cmimi) VALUES (:username, :emri, :mbiemri, :adresa, :qyteti, :kodipostal, :numriTel, :kodiProd, :cmimi)');
        $query->bindParam(':username', $_COOKIE['username']);
        $query->bindParam(':emri', $request['emri']);
        $query->bindParam(':mbiemri', $request['mbiemri']);
        $query->bindParam(':adresa', $request['adresa']);
        $query->bindParam(':qyteti', $request['qyteti']);
        $query->bindParam(':kodipostal', $request['kodipostal']);
        $query->bindParam(':numriTel', $request['numriTel']);
        $query->bindParam(':kodiProd', $kodiProd);
        $query->bindParam(':cmimi', $cmimi);
        $query->execute();
        return header('Location: index.php');
    }
}
?>