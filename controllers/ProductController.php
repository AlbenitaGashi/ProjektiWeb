<?php 
require_once 'C:\xampp\htdocs\ProjektiWeb\config\Database.php';
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
            $query = $this -> database -> pdo ->prepare("UPDATE produkti set kategoria = 'Aksesori' where kodiProd = :kodiProd");
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute();
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
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> bindParam(':os', $os);
            $query -> bindParam(':storage', $storage);
            $query -> bindParam(':ram', $ram);
            $query -> bindParam(':cpu', $cpu);
            $query -> bindParam(':kategoria', $kategoria);
            $query -> execute();
            $query = $this -> database -> pdo ->prepare("UPDATE produkti set kategoria = :kategoria where kodiProd = :kodiProd");
            $query -> bindParam(':kategoria', $kategoria);
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute();
        }
        if($product instanceof SmartDevices){
            $query = $this -> database -> pdo ->prepare("UPDATE  produkti set kategoria = 'SmartDevices' where kodiProd = :kodiProd");
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute();
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
    public function readAProduct($kodiProd){
        $query = $this->database->pdo->prepare('SELECT * from produkti WHERE kodiProd = :kodiProd');
        $query->bindParam(':kodiProd', $kodiProd);
        $query->execute();
        $completeQuery = $query->fetch();
        return $this -> selectCategoryProduct($kodiProd, $completeQuery['kategoria']);
    }
    public function selectCategoryProduct($kodiProd, $kategoria){
        if($kategoria == "Aksesori"){
            $query = $this -> database -> pdo -> prepare('SELECT * from produkti p join Aksesori a on p.kodiProd = a.kodiProd where p.kodiProd = :kodiProd');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query->execute();
            return $query->fetch();
        }
        if($kategoria == "PC" || $kategoria == "Laptop"){
            $query = $this -> database -> pdo -> prepare('SELECT * from produkti p join Kompjuteri k on p.kodiProd = k.kodiProd where p.kodiProd = :kodiProd');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query->execute();
            return $query->fetch();
        }
        if($kategoria == "SmartDevices"){
            $query = $this -> database -> pdo -> prepare('SELECT * from produkti p join SmartDevices s on p.kodiProd = s.kodiProd where p.kodiProd = :kodiProd');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query->execute();
            return $query->fetch();
        }
    }
    public function update($request, $kodiProd, $kategoria){
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
        $query = $this->database->pdo->prepare('UPDATE produkti
                                                set kodiProd = :kodiProd,
                                                image = :image, 
                                                emri = :emri, 
                                                cmimi = :cmimi, 
                                                discount = :discount
                                                WHERE kodiProd = :kodiProd');
        $query ->bindParam(':kodiProd', $kodiProd);
        $query ->bindParam(':image', $image);
        $query ->bindParam(':emri', $emri);
        $query ->bindParam(':cmimi', $cmimi);
        $query ->bindParam(':discount', $discount);
        $query ->bindParam(':kodiProd', $kodiProd);
        $query -> execute();
        if($product instanceof Aksesori){
            /* $query = $this -> database -> pdo ->prepare("UPDATE produkti set kategoria = 'Aksesori' where kodiProd = :kodiProd");
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute(); */
            $pershkrimi = $product -> getPershkrimi();
            $query = $this->database->pdo->prepare('UPDATE aksesori
                                                    set kodiProd = :kodiProd, 
                                                    pershkrimi =  :pershkrimi
                                                    WHERE kodiProd = :kodiProd');
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
            $query = $this->database->pdo->prepare('UPDATE kompjuteri set kodiProd = :kodiProd, 
                                                                      os = :os,
                                                                      storage = :storage,
                                                                      ram = :ram,
                                                                      cpu =  :cpu,
                                                                      kategoria = :kategoria
                                                                      WHERE kodiProd = :kodiProd');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> bindParam(':os', $os);
            $query -> bindParam(':storage', $storage);
            $query -> bindParam(':ram', $ram);
            $query -> bindParam(':cpu', $cpu);
            $query -> bindParam(':kategoria', $kategoria);
            $query -> execute();
            /* $query = $this -> database -> pdo ->prepare("UPDATE produkti set kategoria = :kategoria where kodiProd = :kodiProd");
            $query -> bindParam(':kategoria', $kategoria);
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute(); */
        }
        if($product instanceof SmartDevices){
            /* $query = $this -> database -> pdo ->prepare("UPDATE  produkti set kategoria = 'SmartDevices' where kodiProd = :kodiProd");
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> execute(); */
            $storage = $product -> getStorage();
            $ram = $product -> getRam();
            $cpu = $product -> getCpu();
            $query = $this->database->pdo->prepare('UPDATE SmartDevices 
                                                        set kodiProd = :kodiProd,
                                                        storage = :storage,
                                                        ram = :ram,
                                                        cpu = :cpu
                                                        WHERE kodiProd = :kodiProd');
            $query -> bindParam(':kodiProd', $kodiProd);
            $query -> bindParam(':storage', $storage);
            $query -> bindParam(':ram', $ram);
            $query -> bindParam(':cpu', $cpu);
            $query -> execute();
        }
        header('Location: dashboard.php');
    }
    public function delete($kodiProd){
        $query = $this -> database -> pdo -> prepare('DELETE from produkti where kodiProd = :kodiProd');
        $query -> bindParam(':kodiProd', $kodiProd);
        $query -> execute();
    }
}