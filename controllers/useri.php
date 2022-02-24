<?php
abstract class Useri{
    private $emri;
    private $mbiemri;
    private $dataLindjes;
    private $gjinia;
    private $email;
    private $username;
    private $password;
    public function __construct($emri, $mbiemri, $dataLindjes, $gjinia, $email, $username, $password) {
        $this-> emri = $emri;
        $this-> mbiemri = $mbiemri;
        $this-> dataLindjes = $dataLindjes;
        $this-> gjinia = $gjinia;
        $this-> email = $email;
        $this-> username = $username;
        $this-> password = $password;
    }
    public function getEmri(){
        return $this -> emri;
    }
    public function setEmri($emri){
        $this -> emri = $emri;
    }
    public function getMbiemri(){
        return $this -> mbiemri;
    }
    public function setMbiemri($mbiemri){
        $this -> mbiemri = $mbiemri;
    }
    public function getDataLindjes(){
        return $this -> dataLindjes;
    }
    public function setDataLindjes($dataLindjes){
        $this -> dataLindjes = $dataLindjes;
    }
    public function getGjinia(){
        return $this -> gjinia;
    }
    public function setGjinia($gjinia){
        $this -> gjinia = $gjinia;
    }
    public function getUsername(){
        return $this -> username;
    }
    public function setUsername($username){
        $this -> username = $username;
    }
    public function getEmail(){
        return $this -> email;
    }
    public function setEmail($email){
        $this -> email = $email;
    }
    public function getPassword(){
        return $this -> password;
    }
    public function setPassword($password){
        $this -> password = $password;
    }
    abstract function getRole();
}

class Admin extends Useri {
    public function __construct ($emri, $mbiemri, $dataLindjes, $gjinia, $email, $username, $password) {
        parent:: __construct ($emri, $mbiemri, $dataLindjes, $gjinia, $email, $username, $password);
    }
    public function getRole(){
        return 1;
    }
}
class SimpleUser extends Useri {
    public function __construct($emri, $mbiemri, $dataLindjes, $gjinia, $email, $username, $password){
        parent::__construct($emri, $mbiemri, $dataLindjes, $gjinia, $email, $username, $password);
    }
    public function getRole(){
        return 0;
    }
}
?>