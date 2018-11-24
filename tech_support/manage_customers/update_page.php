<?php
//Get the techs data
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

    require_once('../model/database.php');
  
//Add the product to the database
$query="UPDATE customers SET firstName='".$firstName."', lastName='".$lastName."', address='".$address."', city='".$city."', state='".$state."', postalCode='".$postalCode."', countryCode='".$countryCode."', phone='".$phone."', email='".$email."', password='".$password."' WHERE customerID='".$customer_id."'";
$statement = $db->prepare($query);

$statement->bindValue(':firstName',$firstName);
$statement->bindValue(':lastName',$lastName);
$statement->bindValue(':address',$address);
$statement->bindValue(':city',$city);
$statement->bindValue(':state',$state);
$statement->bindValue(':postalCode',$postalCode);
$statement->bindValue(':countryCode',$countryCode);
$statement->bindValue(':email',$email);
$statement->bindValue(':phone',$phone);
$statement->bindValue(':password',$password);
$statement->bindValue(':customer_id',$customer_id);
$statement->execute();
$statement->closeCursor();

//Display the Customer List page
include('index.php');

?>
