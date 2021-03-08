<?php

abstract class Product { 
    const Margin = 25;
    abstract public function marginCalc();
    abstract public function totalCost();
} 

//Цифровой товар
class DigitalProduct extends Product {
    
    const Price = 100;	
    private $quantity;
    
    public function __construct($quantity)
    {
        self::setQuantity($quantity);
    }
    
    public function getPrice() {
        return Price;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
    
    public function setQuantity($quantity=0)
    {
        $this->quantity = $quantity;
    }
    
    public function totalCost()
    {
        return $this->getPrice * $this->quantity;
    }

    public function margintCalc()
    {
        return  $this->totalCost() / 100 * parent::Margin;
    }

}

//Штучный товар
class PieceProduct extends DigitalProduct {
    
    public function getPrice() {
        return parent::PRICE * 2;
    }
    
    public function totalCost()
    {
        return $this->getPrice() * parent::getQuantity();
    }
    
    public function marginCalc()
    {
        return $this->totalCost() / 100 * parent::Margin;
    }

}

/*
Весовой продукт идёт отдельно от двух предыдущих.
Наследуем от Product
*/

class WeightProduct extends Product {
    
    private $price;
    private $weight;
    
    public function __construct($price, $weight)
    {
        self::setPrice($price);
        self::setWieght($weight);
    }
    
    public function setPrice($price=0)
    {
        $this->price = $price;
    }
    
    public function setWieght($weight=0)
    {
        $this->weight = $weight;
    }
    
    public function totalCost()
    {
        return $this->price * $this->weight;
    }
    
    public function marginCalc()
    {
        return $this->totalCost() / 100 * parent::Margin;
    }
}


$obj_digital = new ProductDigital(5);
echo $obj_digital->marginCalc();

$obj_real = new ProductReal(5);
echo $obj_real->marginCalc();

$obj_weight = new ProductWeight(5, 500);
echo $obj_weight->marginCalc();

?>