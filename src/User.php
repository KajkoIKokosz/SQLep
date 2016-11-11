<?php
require_once './DBConnection.php';

class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $shippingAddres;
    private $hashedPassword;
    private $conn;
    
    public function __construct($name, $surname, $email, $shippingAddres, $userPassword) {
        $this->id = -1;
        $this->setName($name)
             ->setSurname($surname)
             ->setEmail($email)
             ->setShippingAddres($shippingAddres)
             ->setPassword($userPassword);
        
        $this->conn = getConnection();
    }
    
    public function __destruct() {
        $this->conn->close();
    }
    
    
        //setery
   
    private function setId($id){
        if (is_integer($id)) {
            $this->id = $id;
        } else {
            echo "Nie można nadać obiektowi ID. Wartość nie jest liczbą całkowitą.";
        }
        return $this;
    }
    
    public function setName($name) {
        if (is_string($name) && strlen( trim($name) ) > 0 ) {
            $this->name = $name;
        } else {
            echo "wprowadzono niewłaściwy format imienia";
        }
        return $this;
    }
    
    public function setSurname($surname) {
        if (is_string($surname) && strlen( trim($surname) ) > 0 ) {
            $this->surname = $surname;
        } else {
            echo "wprowadzadzono niewłasciwy format nazwiska";
        }
        return $this;
    }
   
    public function setEmail($email) {
        if (is_string($email) && strlen( trim($email) ) > 0 ) {
            $this->email = $email;
        } else {
            echo "wprowadzono niewłaściwy email";
        }
        return $this;
    }  
    
    public function setShippingAddres($shippingAddres) {
        if (is_string($shippingAddres) && strlen( trim($shippingAddres) ) > 0 ) {
            $this->shippingAddres = $shippingAddres;
        } else {
            echo "wprowadzono niewłaściwy format adresu";
        }
        return $this;
    }
    
    public function setPassword($usersPassword){
        if (is_string($usersPassword) && strlen( trim($usersPassword) ) > 0 ) { // nie może być  tylko liczbowy
            $newHashedPassword = password_hash($usersPassword, PASSWORD_BCRYPT);
            $this->hashedPassword = $newHashedPassword;
            return $this;
        } // setPassword end 
    }
    
} // koniec klasy
