<?php
require_once ('src/init.php');

function body(){
  $session_id = session_id();
  if($session_id){
    $cart_items = CartItem::filterBySessionID($session_id);
  } else {
    $cart_items = array();
  }

?>
	<h2>Cart</h2>
<?php
	foreach($cart_items as $item) {
    $product = $item->getProduct();
    echo "<div>
    {$item->id}
    {$product->name}
    {$product->price}
    {$item->quantity}
    </div>";
	}
}
require_once("base.php");
?>
