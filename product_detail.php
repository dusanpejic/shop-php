<?php
require_once ('src/init.php');

$product = Product::get($_GET['id']);


$brands = Brand::all();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prodavnica</title>
  <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
		<body>
      <div id="container">

        <header>
          <div id="top_container">
              <div id="search_bar">
                <input type="text" placeholder="Search...">
              </div>

              <div id="currency">
                <select>
                  <option>EUR</option>
                  <option>RSD</option>
                  <option>USD</option>
                <select>
              </div>

              <div id="cart">
                <a href="#cart.php"<span>Cart (0)</span></a> <a href="#checkout.php"><span>Checkout</span></a>
              </div>
          </div> <!-- end of top_container -->

          <div id="logo">
            <a href="index.php"><img src="media/images/logo.png" alt="logo"></a>
          </div>


              <nav>
                <ul>
                  <a href=""><li>Compare</li></a>
                  <a href=""><li>News</li></a>
                <ul>
              </nav>

        </header>


      <aside>
        <h2>Brands</h2>
        <ul>
          <?php
            foreach($brands as $brand) {
              echo "<a href='?brand_id={$brand->id}'><li>{$brand->name}</li></a><hr>";
            }
          ?>
        </ul>
				<div id="log">
					<form>
						<input type="text" placeholder="Username">
						<br><br>
						<input type="password" placeholder="Password">
						<br><br>
						<input type="submit" value="Login">
					</form>
				</div>
      </aside>

      <main>
      <h2>Featured products</h2>
<?php
	echo "Name: {$product->name} <br>
				Price:{$product->price} <br>
				Brand:{$product->brand_id}";
	?>
	<form action="comparison-add.php" method="POST">
		<input type="hidden" name="product_id" value="<?=$product->id?>">
		<input type="submit" value="Compare">
	</form>
			</main>

			<div class="clear"></div>

		</div> <!-- end shipping -->

		<div class="shipping">
			<span><img src="media/icon/free-delivery.png"> FREE SHIPPING ON ORDERS OVER </span>
			<span><img src="media/icon/ecology.png"> ENVIRONMENT CARE</span>
			<span><img src="media/icon/secure.png"> SECURE SHOPPING</span>
		</div> <!-- end shipping -->
		<footer>

		</footer>
		</body>
</html>
