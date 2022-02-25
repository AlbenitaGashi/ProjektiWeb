<?php 
class Contacts{
    private $emri;
    private $mbiemri;
    private $email;
    private $message;
    public function __construct($emri, $mbiemri, $email, $message){
        $this-> emri = $emri;
        $this-> mbiemri = $mbiemri;
        $this-> email = $email;
        $this -> message = $message;
    }
    public function getEmri(){
        return $this -> emri;
    }
    public function getMbiemri(){
        return $this -> mbiemri;
    }
    public function getEmail(){
        return $this -> email;
    }
    public function getMessage(){
        return $this -> message;
    }
}
?>