<?php
/**
 * Description of ItemTests
 *
 * @author KajkoIKokosz
 */

require_once './DBConnection.php';

class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $shippingAddres;
    private $hashedPassword;
    
    
    public function __construct($name, $surname, $email, $shippingAddres, $userPassword) {
        $this->id = -1;
        $this->setName($name)
             ->setSurname($surname)
             ->setEmail($email)
             ->setShippingAddres($shippingAddres)
             ->setPassword($userPassword); 
    }
    
    //setery
    public function setId($id){
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
    
    // getery
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getSurname() { return $this->surname; }
    public function getEmail() { return $this->email; }
    public function getShippingAddres() { return $this->shippingAddres; }
    public function getHashedPassword() { return $this->hashedPassword; }
    
    public function saveToDB(){
        $conn = getConnection();
        if($this->id == -1) {
            $statement = $conn->prepare("INSERT INTO `users` 
                (Name, Surname, email, shipping_addres, hashed_password) 
                VALUES (?, ?, ?, ?, ?)");
            
            if ($statement) {
                $statement->bind_param('sssss',
                    $this->name,
                    $this->surname,
                    $this->email,
                    $this->shippingAddres,
                    $this->hashedPassword
                );
            } else {
                echo "błąd utworzenia statement";
            }
            
            if ($statement->execute()){
                $this->id = $conn->insert_id;
                // print_r($this);
                echo "wprowadzono poprawnie użytkownika<br>";
                return true;
            } // end of if ($statement->execute())
        } else {// if($this->id != -1) 
            $statement = $conn->prepare("UPDATE `users` SET
                Name = ?,
                Surname = ?,
                email = ?,
                shipping_addres = ?,
                hashed_password = ?
                WHERE id = $this->id"
            );
            
           if ($statement) {
                $statement->bind_param('sssss',
                    $this->name,
                    $this->surname,
                    $this->email,
                    $this->shippingAddres,
                    $this->hashedPassword
                );
            } else {
                echo "błąd utworzenia statement";
            }
            
            if ( $statement->execute() ) {
                echo "dane użytkownika zostały poprawnie zmodyfikowane<br>";
                //print_r($this);
                return true;
            } else {
                echo "błąd wykonania statement: ". $statement->error;
            }
        }
    } // saveToDB function end
    
} // koniec klasy
