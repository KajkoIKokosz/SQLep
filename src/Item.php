<?php
/**
 * Description of ItemTests
 *
 * @author KajkoIKokosz
 */
require_once './DBConnection.php';

class Item {
    private $id;
    private $itemName;
    private $description;
    private $price;
    private $quantity;
    private $category;
    
    public function __construct($itemName, $descript=NULL, $price, $qantity=0) {
        $this->id = -1;
        $this->setItemName($itemName)
             ->setDescription($descript)
             ->setPrice($price)
             ->setQuantity($qantity);
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
    
    public function setItemName($name) {
        if (is_string($name) && strlen( trim($name) ) > 0 ) {
            $this->itemName = $name;
        } else {
            echo "wprowadzono niewłaściwą nazwę przedmiotu";
        }
        return $this;
    }
    
    public function setDescription($descript) {
        if (is_string($descript) && strlen( trim($descript) ) > 0 ) {
            $this->description = $descript;
        } else {
            echo "wprowadzono niewłaściwy opis";
        }
        return $this;
    }
    
    public function setPrice( $price ){
        if ( is_numeric($price) && $price != 0 ) {
            $this->price = $price;
        } else {
            echo "wprowadzono niewłaściwą cenę produktu";
        }
        return $this;
    }
    
    public function setQuantity($quant) {
        if ( is_integer($quant) && $quant > 0 ) {
            $this->quantity = $quant;
        }
    }
    
    public function setCategory($category) {
        $this->category = $category;
    }
    
    // getery
    public function getItemId() {
        return $this->id;
    }
    
    public function getItemName() {
        return $this->itemName;
    }
    
    public function getItemDescription() {
        return $this->description;
    }
    
    public function getItemPrice() {
        return $this->price;
    }
    
    public function getItemQuantity() {
        return $this->quantity;
    }
    
    public function getCategory() {
        return $this->category;
    }
    
    // add / sell
    public function addItem($quant) {
        if ( is_integer($quant) && $quant > 0 ) {
            $this->quantity += $quant;
        }
    }
    
    public function sellItem($quant) {
        if ( is_integer($quant) && $quant > 0 ) {
            if ($this->getItemQuantity() >= $quant) {
                $this->quantity -= $quant;
            } else {
                // jeśli zakupiono większą ilość produktu niż jest na stanie, ilość produktu na stanie jest zerowana
                // i zwracany jest komunikat, że zakupiono tylko dostępną ilość produktu
                $itemQuantity = $this->getItemQuantity();
                $itemName = $this->getItemName();
                $message = "Zakupiłeś tylko $itemQuantity produktu: $itemName";
                $this->quantity = 0;
                return $message;
            } 
        }
    } // koniec funkcji sellItem
    
public function saveToDb(){
        $conn = getConnection();
        if ( $this->id == -1 ) {
            $statement = $conn->prepare("INSERT INTO `items`(`Item_name`, `Description`, `Price`, `Quantity`) VALUES (?, ?, ?, ?)");
            
            if ($statement) {
                $statement->bind_param(
                    'ssdi',
                    $this->getItemName(),
                    $this->getItemDescription(),
                    $this->getItemPrice(),
                    $this->getItemQuantity()
                );
            } else {
                echo "błąd utworzenia statement";
            }
            
            if ( $statement->execute() ){
                $this->setId($conn->insert_id);
                echo "produkt {$this->getItemName()} został wprowadzony";
                return true;
            } else {
                echo $statement->error;
            } // end of if ($statement->execute())
            
        } else { // if id != -1
            $statement = $conn->prepare("UPDATE `items` SET `Item_name`=?,`Description`=?,`Price`=?,`Quantity`=? WHERE id = $this->id");
            if ( $statement ) {
                $statement->bind_param('ssdi', $this->getItemName(), $this->getItemDescription(), $this->getItemPrice(), $this->getCategory());
            }
            $insertId = $this->getItemId(); // dlaczego nie mogę pozyskać tego id wewnątrz if ( $statement->execute() ){
            if ( $statement->execute() ){
                $this->setId($conn->insert_id);
                echo "produkt {$this->getItemName()} o id $insertId został zmodyfikowany";
                return true;
            } else {
                echo "Nie udało się zmodyfikować przedmiotu o id $insertId, $statement->error";
            } // end of if ($statement->execute())
        }
    } // koniec saveToDb


    
} // koniec klasy




