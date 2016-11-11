<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemTests
 *
 * @author KajkoIKokosz
 */

include_once '../src/Item.php';

class ItemTests extends PHPUnit_Framework_TestCase{
    
    protected $newObject;

    protected function setUp()
    {
        $this->newObject = new Item("kalafior","wypasiony kalafior",16, 10);
    }
    
    public function testInstanceObject() {
        $this->assertTrue($this->newObject instanceof Item, "Nie udało się utworzyć obiektu");    
    }
    
    public function testAddItem() {
        $this->newObject->addItem(10);
        $this->assertEquals($this->newObject->getItemQuantity(), 20, "zwraca niepoprawną ilość po dodaniu n sztuk produktu");
    }
    
    public function testSellItem() {
        $this->newObject->sellItem(4);
        $this->assertEquals($this->newObject->getItemQuantity(), 6, "zwraca niepoprawną ilość po sprzedaniu n sztuk produktu");
    }
    
    public function testSellIfQuantLessThanOrder() {
        $this->assertEquals($this->newObject->sellItem(14), "Zakupiłeś tylko 10 produktu: ".$this->newObject->getItemName());
    }
    
//    public function testGetItemId() {
//        $this->assertEquals($this->newObject->getItemId(), -1, "getItemId zwraca niewłaściwe id");
//    }
    /*
     * Warning: require_once(./DBConnection.php): failed to open stream: No such file or directory in C:\xampp\htdocs\SQLep\src\Item.php on line 7

        Fatal error: require_once(): Failed opening required './DBConnection.php' (include_path='C:\xampp\php\PEAR') in C:\xampp\htdocs\SQLep\src\Item.php on line 7
        PHP Warning:  require_once(./DBConnection.php): failed to open stream: No such file or directory in C:\xampp\htdocs\SQLep\src\Item.php on line 7
        PHP Fatal error:  require_once(): Failed opening required './DBConnection.php' (include_path='C:\xampp\php\PEAR') in C:\xampp\htdocs\SQLep\src\Item.php on line 7

     */
}
