<?php

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

//Get Incident Information
$cID=filter_input(INPUT_POST, 'custID');
$product=filter_input(INPUT_POST,'product');
$title=filter_input(INPUT_POST,'title');
$description=filter_input(INPUT_POST,'description');

debug_to_console($cID);

//Validate Incident Info
if($cID==null || $product==null
||$title==null || $description==null){
    $error="Invalid product data. Check all fields and try again.";
    include('../errors/error.php');
  }
  else{
    require_once('../model/database.php');


//Date Information
$openDate = date('Y-m-d H:i:s');


//Add the product to the database
$query='INSERT INTO incidents (customerID, productCode, dateOpened, title, description)
  VALUES(:cID, :product, :openDate, :title, :description)';

$statement = $db->prepare($query);

debug_to_console($openDate);

$statement->bindValue(':cID',$cID);
$statement->bindValue(':product',$product);
$statement->bindValue(':openDate',$openDate);
$statement->bindValue(':title',$title);
$statement->bindValue(':description',$description);
$statement->execute();
$statement->closeCursor();

//Display the Technician List page
include('incident_created.php');
}
?>
