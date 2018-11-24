<?php
//Get the product data
$productCodeIn=filter_input(INPUT_POST,'productCodeIn');
$name=filter_input(INPUT_POST,'name');
$version=filter_input(INPUT_POST,'version');
$releaseDate=filter_input(INPUT_POST,'releaseDate');

//Validate inputs
if($productCodeIn==null ||$name==null|| $version==null
||$releaseDate==null){
    $error="Invalid product data. Check all fields and try again.";
    include('../errors/error.php');
  }else{
    require_once('../model/database.php');
  }

$timestamp = strtotime($releaseDate);
$new_date_format = date('Y-m-d H:i:s', $timestamp);

//Add the product to the database
$query='INSERT INTO products (productCode, name, version, releaseDate)
  VALUES(:productCode, :name, :version, :releaseDate)';
$statement = $db->prepare($query);
$statement->bindValue(':productCode',$productCodeIn);
$statement->bindValue(':name',$name);
$statement->bindValue(':version',$version);
$statement->bindValue(':releaseDate',$new_date_format);
$statement->execute();
$statement->closeCursor();

//Display the Product List page
include('index.php');

?>
