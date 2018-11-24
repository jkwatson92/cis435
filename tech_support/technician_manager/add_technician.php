<?php
//Get the techs data
$firstName=filter_input(INPUT_POST,'firstName');
$lastName=filter_input(INPUT_POST,'lastName');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$password_in=filter_input(INPUT_POST,'password');


//Validate inputs
if($firstName==null ||$lastName==null|| $email==null
||$phone==null ||$password_in==null){
    $error="Invalid product data. Check all fields and try again.";
    include('errors/error.php');
  }else{
    require_once('../model/database.php');
  }
  
//Add the product to the database
$query='INSERT INTO technicians (firstName, lastName, email, phone, password)
  VALUES(:firstName, :lastName, :email, :phone, :password)';
$statement = $db->prepare($query);

$statement->bindValue(':firstName',$firstName);
$statement->bindValue(':lastName',$lastName);
$statement->bindValue(':email',$email);
$statement->bindValue(':phone',$phone);
$statement->bindValue(':password', $password_in);
$statement->execute();
$statement->closeCursor();

//Display the Technician List page
include('index.php');

?>
