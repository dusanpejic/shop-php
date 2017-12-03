<?php
require_once ('db.php');

class Brand {
    public $id;
    public $name;

    public static function all(){
      global $conn;
      $statement = $conn->prepare('SELECT id, name from brand');
      $statement->execute();
      $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Brand');
      return $all;
    }
}

class Product {
  public $id;
  public $name;
  public $price;
  public $brand_id;

  public static function all(){
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id from product');
    $statement->execute();
    $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $all;
  }

  public static function filterByBrand($brand_id) {
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id from product where brand_id = :brand_id');
    $statement->execute(array(':brand_id' => $brand_id));
    $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $all;
  }

  public static function get($id) {
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id from product where id = :id');
    $statement->execute(array(':id' => $id));
    return $statement->fetchObject('Product');
  }
}


class Cart {
  public $id;
  public $session_id;

  public static function getOrCreate($session_id) {
    global $conn;
    $statement = $conn->prepare('SELECT id, session_id from cart where session_id = :session_id');
    $statement->execute(array(':session_id' => $session_id));
    $cart = $statement->fetchObject('Cart');
    if(!$cart){
        $statement = $conn->prepare('INSERT INTO cart (session_id) VALUES (:session_id)');
        $statement->execute(array(':session_id' => $session_id));
        $cart = new Cart();
        $cart->id = $conn->lastInsertId();
        $cart->session_id = $session_id;
    }
    return $cart;
  }

}

class CartItem {
  public $id;
  public $cart_id;
  public $product_id;
  public $quantity;

  public static function filterBySessionID($session_id){
    global $conn;
    $statement = $conn->prepare('SELECT cart_item.id, cart_item.cart_id, cart_item.product_id, cart_item.quantity from cart_item inner join cart ON cart_item.cart_id = cart.id where cart.session_id = :session_id');
    $statement->execute(array(':session_id' => $session_id));
    return $statement->fetchAll(PDO::FETCH_CLASS, 'CartItem');
  }

  public function save(){
    global $conn;
    if(isset($this->id)){
        $statement = $conn->prepare('UPDATE cart_item SET cart_id = :cart_id, product_id = :product_id, quantity =:quantity WHERE id = :id');
        $statement->execute(array(':cart_id' => $this->cart_id, ':product_id' => $this->product_id, ':quantity' => $this->quantity, ':id' => $this->id));
    } else {
        $statement = $conn->prepare('INSERT INTO cart_item (cart_id, product_id, quantity) VALUES (:cart_id, :product_id, :quantity)');
        $statement->execute(array(':cart_id' => $this->cart_id, ':product_id' => $this->product_id, ':quantity' => $this->quantity));
    }




  }

  public function getProduct(){
    if(!isset($this->product)){
      $this->product = Product::get($this->product_id);
    }
      return $this->product;
  }
}
