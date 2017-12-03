<?php
require_once ('src/init.php');

$session_id = session_id();
$cart = Cart::getOrCreate($session_id);


$cart_items = CartItem::filterBySessionID($session_id);
  $updated = false;
  foreach($cart_items as $cart_item){
    if($cart_item->product_id == $_POST['product_id']){
      $cart_item->quantity = $cart_item->quantity + 1;
      $cart_item->save();
      $updated = true;
    }
  }

  $cart_items = array();



if(!$updated){
  $cart_item = new CartItem();
  $cart_item->product_id = $_POST['product_id'];
  $cart_item->quantity = 1;
  $cart_item->cart_id = $cart->id;
  $cart_item->save();
}
header("location: cart.php");
