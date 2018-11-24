<?php
require_once('../model/database.php');

//Delete the product from the database
$product_code = filter_input(INPUT_POST, 'product_code');
if($product_code!=false){
  $query = 'DELETE FROM products WHERE productCode =:product_code';
  $statement=$db->prepare($query);
  $statement->bindValue(':product_code',$product_code);
  $statement->execute();
  $statement->closeCursor();
}

//Display the Product List page
include('index.php');

?>
