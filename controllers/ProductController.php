<?php 
require_once '../config/Database.php';
require 'Produkti.php';
class ProductController{
    public $database;
    public function __construct(){
       $this -> database = new Database;
    }
    public function readData(){
        $query = $this -> database ->pdo->query('SELECT * FROM produkti');
        return $query -> fetchAll();
    }
    public function insert($request, $kategoria){
        $product;
        if($kategoria == "PC"){
            $product = new Kompjuteri($request['image'], $request['kodiProd'], $request['emri'], $request['cmimi'], $request['discount'], $request['os'],$request['storage'], $request['ram'], $request['cpu'], false);    
        }
        if($kategoria == "Laptop"){
            $product = new Kompjuteri($request['image'], $request['kodiProd'], $request['emri'], $request['cmimi'], $request['discount'], $request['os'],$request['storage'], $request['ram'], $request['cpu'], true);
        }
        if($kategoria == "SmartDevices"){
            $product = new SmartDevices($request['image'], $request['kodiProd'], $request['emri'], $request['cmimi'], $request['discount'], $request['storage'], $request['ram'], $request['cpu']);
        }
        if($kategoria == "Aksesori"){
            $product = new Aksesori($request['image'], $request['kodiProd'], $request['emri'], $request['cmimi'], $request['discount'], $request['pershkrimi']);    
        }
        $kodiProd = $product -> getKodiProd();
        $emri = $product -> getEmri();
        $cmimi = $product -> getCmimi();
        $discount = $product -> getDiscount();
        $image = $product -> getImage();
        $query = $this->database->pdo->prepare('INSERT INTO produkti (kodiProd, image, emri, cmimi, discount) values (:kodiProd, :image, :emri, :cmimi, :discount)');
        $query ->bindParam(':kodiProd', $kodiProd);
        $query ->bindParam(':image', $image);
        $query ->bindParam(':emri', $emri);
        $query ->bindParam(':cmimi', $cmimi);
        $query ->bindParam(':discount', $discount);
        $query -> execute();
        if($product instanceof Aksesori){
            $pershkrimi = $product -> getPershkrimi();
            $query = $this->database->pdo->prepare('INSERT INTO aksesori (kodiProd, pershkrimi) values (:kodiProd, :pershkrimi)');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> bindParam(':pershkrimi', $pershkrimi);
            $query -> execute();
        }
        if($product instanceof Kompjuteri){
            $os = $product -> getOs();
            $storage = $product -> getStorage();
            $ram = $product -> getRam();
            $cpu = $product -> getCpu();
            $kategoria = $product -> getKategoria();
            $query = $this->database->pdo->prepare('INSERT INTO kompjuteri (kodiProd, os, storage, ram, cpu, kategoria) values (:kodiProd, :os, :storage, :ram, :cpu, :kategoria)');
            $query -> bindParam(':kodiProd', $product -> getKodiProd());
            $query -> bindParam(':os', $os);
            $query -> bindParam(':storage', $storage);
            $query -> bindParam(':ram', $ram);
            $query -> bindParam(':cpu', $cpu);
            $query -> bindParam(':kategoria', $kategoria);
            $query -> execute();
        }
        if($product instanceof SmartDevices){
            $storage = $product -> getStorage();
            $ram = $product -> getRam();
            $cpu = $product -> getCpu();
            $query = $this->database->pdo->prepare('INSERT INTO SmartDevices (kodiProd, storage, ram, cpu) values (:kodiProd, :storage, :ram , :cpu)');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> bindParam(':storage', $storage);
            $query -> bindParam(':ram', $ram);
            $query -> bindParam(':cpu', $cpu);
            $query -> execute();
        }
        return header('Location: dashboard.php');
    }
    public function edit($kodiProd){
        $query = $this->db->pdo->prepare('SELECT * from produkti WHERE kodiProd = :kodiProd');
        $query->bindParam(':kodiProd', $kodiProd);
        $query->execute();
        return $query->fetch();
    }

}?>