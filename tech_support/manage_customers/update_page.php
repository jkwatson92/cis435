<?php
//Get the customer data
$firstName=filter_input(INPUT_POST,'firstName');
$lastName=filter_input(INPUT_POST,'lastName');
$address=filter_input(INPUT_POST,'address');
$city=filter_input(INPUT_POST,'city');
$state=filter_input(INPUT_POST,'state');
$postalCode=filter_input(INPUT_POST,'postalCode');
$countryCode=filter_input(INPUT_POST,'countryCode');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$password=filter_input(INPUT_POST,'password');
$customer_id=filter_input(INPUT_POST,'customerID');

//Validate inputs
if($firstName==null ||$lastName==null|| $address==null||$city==null||$state==null||$postalCode==null||$countryCode==null||$email==null ||$phone==null ||$password==null){
    $error="Invalid product data. Check all fields and try again.";
    include('../errors/error.php');
}else{
    require_once('../model/database.php');
}
//Update customer info in database
$query="UPDATE customers SET firstName='".$firstName."', lastName='".$lastName."', address='".$address."', city='".$city."', state='".$state."', postalCode='".$postalCode."', countryCode='".$countryCode."', phone='".$phone."', email='".$email."', password='".$password."' WHERE customerID='".$customer_id."'";
$statement = $db->prepare($query);

$statement->execute();
$statement->closeCursor();

//Display the Customer List page
include('index.php');
?>
