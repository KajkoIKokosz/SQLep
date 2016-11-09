<?php

class Item {
    static private $conn;
    private $id;
    private $itemName;
    private $description;
    private $price;
    
    public function __construct($itemName, $descript=NULL, $price) {
        $this->id = -1;
        $this->setItemName($name)
             ->setDescription($descript)
             ->setPrice($price);
    }
    
    public function setItemName($name) {
        if (is_string($name) && strlen( trim($name) ) > 0 ) {
            $this->itemName = $name;
        }
        return $this;
    }
    
    public function setDescription($descript) {
        if (is_string($descript) && strlen( trim($descript) ) > 0 ) {
            $this->description = $descript;
        }
        return $this;
    }
    
    public function setPrice( $price ){
        if ( is_numeric($price) && $price != 0 ) {
            $this->price = $price;
        }
    }
    
}
