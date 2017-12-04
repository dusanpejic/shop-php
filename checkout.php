<?php
require_once ('src/init.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $session_id = session_id();
  $cart_items = CartItem::filterBySessionID($session_id);
  $order = new Order();
  $order->first_name = $_POST['first_name'];
  $order->last_name = $_POST['last_name'];
  $order->email = $_POST['email'];
  $order->street = $_POST['street'];
  $order->city = $_POST['city'];
  $order->zipcode = $_POST['zipcode'];
  $order->order_date = time();
  $order->status = "created";
  $order->save();

  foreach($cart_items as $cart_item){
    $product = $cart_item->getProduct();
    $order_item = new OrderItem();
    $order_item->order_id = $order->id;
      $order_item->product_id = $cart_item->product_id;
      $order_item->quantity = $cart_item->quantity;
      $order_item->price = $product->price;
      $order_item->save();
      $cart_item->delete();
  }

  header('location: checkout-done.php');
  exit;
}

function body(){
?>
	<h2>Checkout</h2>
  <form action="checkout.php" method="POST">
    <p><input type="text" name='first_name' placeholder="First name" required></p>
    <p><input type="text" name='last_name' placeholder="Last name" required></p>
    <p><input type="email" name='email' placeholder="E-mail" required></p>
    <p><input type="text" name='street' placeholder="Street" required></p>
    <p><input type="text" name='city' placeholder="City" required></p>
    <p><input type="text" name='zipcode' placeholder="Zipcode" required></p>
    <p><input type="submit" name="send"></p>
  </form>
<?php
}
require_once("base.php");
?>
