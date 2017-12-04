<?php
require_once ('src/init.php');

function body(){
	session_start();
	$models = array();
	if(isset($_SESSION['product_ids'])){
		foreach($_SESSION['product_ids'] as $product_id){
			array_push($models, Product::get($product_id));
		}
	}
?>
	<h2>Compare</h2>
<?php
	foreach($models as $model) {
		echo "<div class='item'>
					<a href='product_detail.php?id={$model->id}'><img src='media/model/oneplus-5.jpg'>
					{$model->name}</a>
						<hr>
					<p>{$model->price}</p>
						<hr>
					</div>";
	}
}
require_once("base.php");
?>
