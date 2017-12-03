<?php
require_once('src/init.php');
if (!isset($_SESSION['product_ids'])){
  $_SESSION['product_ids'] = array();
}

if(!in_array($_POST['product_id'], $_SESSION['product_ids'])){
  array_push($_SESSION['product_ids'], $_POST['product_id']);
}

header("location: compare.php");
