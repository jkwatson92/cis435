<?php
require_once('../model/database.php');

//Delete the tech from the database
$tech_id = filter_input(INPUT_POST, 'tech_id',FILTER_VALIDATE_INT);
echo "'<script>console.log(\"$tech_id\")</script>'";
echo '<script>console.log("DO A THING")</script>';
if($tech_id!=false){
  $query = 'DELETE FROM technicians WHERE techID =:tech_id';
  $statement=$db->prepare($query);
  $statement->bindValue(':tech_id',$tech_id);
  $statement->execute();
  $statement->closeCursor();
}

//Display the Technician List page
include('index.php');

?>
