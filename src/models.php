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
