<?php
require_once ('src/init.php');

function body(){
	$product = Product::get($_GET['id']);
	$brand = Brand::get($product->brand_id);
	echo "<img src='{$product->image_large}' width='600' alt='image'><br>
				Name: {$product->name} <br>
				Price:{$product->price} <br>
				Brand:{$brand->name}";
?>

	<form action="comparison-add.php" method="POST">
		<input type="hidden" name="product_id" value="<?=$product->id?>">
		<input type="submit" value="Compare">
	</form>

	<form action="cart-add.php" method="POST">
		<input type="hidden" name="product_id" value="<?=$product->id?>">
		<input type="submit" value="Add to cart">
	</form>

<?php
}
require_once('base.php');
?>
