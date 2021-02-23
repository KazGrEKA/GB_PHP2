<?php

class Product{
    private $id;
    private $title;
    private $price;
    private $weight;
    public function __construct($id, $title, $price, $weight) {
    $this->id = $id;
    $this->title = $title;
    $this->price = $price;
    $this->weight = $weight;
    }    
    public function getId() {
        return $this->id; 
    }
     public function getTitle() {
        return $this->title;
    }
     public function getPrice() {
        return $this->price;
    } 
     public function getWeight() {
        return $this->weight;
    }
     public function getData() {
        $data = 'ID товара: ' . $this->id . '<br>' .
                'Название: ' . $this->title . '<br>' .
                'Цена: ' . $this->price . ' руб'.'<br>' .
                'Вес: ' . $this->weight . ' грамм'. '<br>';
        return $data;
    }
}

class Beverage extends Product {
    private $volume;
    public function __construct($id, $title, $price, $weight, $volume) {
        parent::__construct($id, $title, $price, $weight);
        $this->volume = $volume;
    }
     public function getVolume() {
        return $this->volume;
    }
     public function getData() {
        $data = parent::getData() . 'Объём: ' . $this->volume. ' мл.'. '<br>';
        return $data;
    }
}

class MilkProduct extends Product {
    private $fat;
    
    public function __construct($id, $title, $price, $weight, $fat) {
        parent::__construct($id, $title, $price, $weight);
        $this->fat = $fat;
    }
     public function getFat() {
        return $this->fat;
    }
     public function getData() {
        $data = parent::getData() . 'Жирность: ' . $this->fat. '%'. '<br>';
        return $data;
    }    
}

$butter = new MilkProduct(1234, 'Веселый Молочник', 300, 1000, 45);
echo $butter->getData();



//5 задание
class A5 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A5();
$a2 = new A5();
$a1->foo(); // будет 1
$a2->foo(); // будет 2
$a1->foo(); // будет 3
$a2->foo(); // будет 4


//6 задание
class A6 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B6 extends A6 {
}
$a1 = new A6();
$b1 = new B6();
$a1->foo(); // будет 1
$b1->foo(); // будет 1
$a1->foo(); // будет 2
$b1->foo(); // будет 2
