<?php

abstract class User{
    private $Emri;
    private $Mbiemri;
    private $DataLindjes;
    private $Gjinia;
    private $Email;
    private $Username;
    private $Password;


    public function __construct( $Emri,
                                $Mbiemri,
                                $DataLindjes,
                                $Gjinia,
                                $Email,
                                $Username,
                                $Password,
 ) {
        $this->Emri = $Emri;
        $this-> Mbiemri = $Mbiemri;
        $this-> DataLindjes = $DataLindjes;
        $this->Gjinia = $Gjinia;
        $this->Email = $Email;
        $this->Username = $Username;
        $this->Password = $Password;



    }

    public function getUsername (){

        return $this->Username;
    }

    public function setUsername ($username) {
        $this->username = $username;
    }

    public function __toString(){
        return "Prova 8839";

    }
    abstract function getRole(); #metod abstrakte
}

class Admin extends User {
    private $permissions;

    public function __construct ($Emri, $Mbiemri, $DataLindjes, $Gjinia, $Email, $Username, $Password,  $permissions) {
            parent:: __construct ($Emri, $Mbiemri, $DataLindjes, $Gjinia, $Email, $Username, $Password);
            $this ->permissions = $permissions;


    }

    public function getPermissions (){
        return $this -> permissions;
    }

    public function __toString(){
        return parent:: __toString() ."from Admin";

    }

    public function getRole(){


    }
}
class SimpleUser extends User {
public function getRole(){
        

    }

}


?>