<?php
/**
 * Description of ItemTests
 *
 * @author KajkoIKokosz
 */

class Item {
    static private $conn;
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
    
    public static function setConnection($newConnection){
        self::$conn = $newConnection;
    }
    
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
        if ( $this->id != -1 ) {
            $statement = "INSERT INTO `items`(`Item_name`, `Description`, `Price`, `Quantity`) VALUES (?, ?, ?, ?))";
            
            $statement->bind_param('ssdi',
                $this->getItemName(),
                $this->getDescription(),
                $this->getPrice,
                $this->getQuantity);
            
            if ($statement->execute()){
                $this->id = $conn->insert_id;
                print_r($this);
                return true;
            } // end of if ($statement->execute())
            
        } {} // tu będzie edycja item'u
    } // koniec saveToDb
    
}




