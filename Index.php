<?php
require_once ('src/init.php');

function body(){
	if(isset($_GET['q'])){
		$models = Product::filterByQuery($_GET['q']);
	} else if(isset($_GET['brand_id'])){
		$models = Product::filterByBrand($_GET['brand_id']);
	} else {
		$models = Product::all();
	}
?>
<h2>Featured products</h2>
<?php
	foreach($models as $model) {
		echo "<div class='item'>
					<a href='product_detail.php?id={$model->id}'><img src='{$model->image}'>
					{$model->name}</a>
						<hr>
					<p>{$model->price}</p>
						<hr>
					</div>";
	}
}
require_once('base.php');
?>
