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

    public static function get($id) {
      global $conn;
      $statement = $conn->prepare('SELECT id, name FROM brand WHERE id = :id');
      $statement->execute(array(':id' => $id));
      return $statement->fetchObject('Brand');
    }
}

class Product {
  public $id;
  public $name;
  public $price;
  public $brand_id;
  public $image;
  public $image_large;

  public static function all(){
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id, image from product');
    $statement->execute();
    $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $all;
  }

  public static function filterByBrand($brand_id) {
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id, image from product where brand_id = :brand_id');
    $statement->execute(array(':brand_id' => $brand_id));
    $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $all;
  }

  public static function filterByQuery($q) {
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id, image from product where name LIKE :q');
    $statement->execute(array(':q' => "%" . $q . "%"));
    $all = $statement->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $all;
  }

  public static function get($id) {
    global $conn;
    $statement = $conn->prepare('SELECT id, name, price, brand_id, image, image_large from product where id = :id');
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
  public function delete(){
    global $conn;
    $statement = $conn->prepare('DELETE FROM cart_item WHERE id = :id ');
    $statement->execute(array(':id' => $this->id));
  }


  public function getProduct(){
    if(!isset($this->product)){
      $this->product = Product::get($this->product_id);
    }
      return $this->product;
  }
}


class Order {
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $street;
  public $city;
  public $zipcode;
  public $order_date;
  public $status;

  public function save(){
    global $conn;
    $statement = $conn->prepare('INSERT INTO `order` (first_name, last_name, email, street, city, zipcode, order_date, status) VALUES (:first_name, :last_name, :email, :street, :city, :zipcode, :order_date, :status)');
    $statement->execute(array(':first_name' => $this->first_name, ':last_name' =>$this->last_name, ':email' =>$this->email, ':street' =>$this->street, ':city' =>$this->city, ':zipcode' =>$this->zipcode, ':order_date' =>$this->order_date, ':status' =>$this->status));
    $this->id = $conn->lastInsertID();
    }
}

class OrderItem {
  public $id;
  public $order_id;
  public $product_id;
  public $quantity;
  public $price;

  public function save(){
    global $conn;
    $statement = $conn->prepare('INSERT INTO `order_item` (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)');
    $statement->execute(array(':order_id' => $this->order_id, ':product_id' =>$this->product_id, ':quantity' =>$this->quantity, ':price' =>$this->price));
    $this->id = $conn->lastInsertID();
    }
}
