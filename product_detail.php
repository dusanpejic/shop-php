<?php
require_once ('src/init.php');

function body(){
	$product = Product::get($_GET['id']);
	echo "Name: {$product->name} <br>
				Price:{$product->price} <br>
				Brand:{$product->brand_id}";
?>
	<form action="comparison-add.php" method="POST">
		<input type="hidden" name="product_id" value="<?=$product->id?>">
		<input type="submit" value="Compare">
	</form>
<?php
}
require_once('base.php');
?>
