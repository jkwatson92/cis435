<?php
require('../model/database.php');
//Get the customers last name
$last_name=filter_input(INPUT_POST,'lastName');
echo '<script>console.log("DO A THING")</script>';

// //Get all customers
// $queryAllCustomers = 'SELECT * FROM customers ORDER BY customerID';
// $statement2 = $db->prepare($queryAllCustomers);
// $statement2->execute();
// $allCustomers=$statement2->fetchAll();
// $statement2->closeCursor();

//Find customers with given last name
$queryLastName= 'SELECT * FROM customers WHERE lastName=$last_name ORDER BY firstName';
$statement2 = $db->prepare($queryLastName);
$statement2->execute();
$customers=$statement2->fetchAll();
echo "'<script>console.log(\"$last_name\")</script>'";
$statement2->closeCursor();

//Display the Customer page
include('index.php');

?>

<!DOCTYPE html>
<html>
<section>
  <!-- display a table of customers -->
  <h2>Results</h2>
  <table>
    <tr>
      <th>Name</th>
      <th>Email Address</th>
      <th>City</th>
      <th>&nbsp;</th>
    </tr>
    <?php foreach($customers as $cus) : ?>
      <?php $first=$cus['firstName'];
            $last=$cus['lastName'];
            $whole_name= $first." ".$last;?>
      <tr>
        <td><?php echo $whole_name; ?></td>
        <td><?php echo $cus['email']; ?></td>
        <td class="right"><?php echo $cus['city']; ?></td>
        <td><form action="search.php" method="post">
          <input type="hidden" name="last_name" value="<?php echo $cus['lastName']; ?>">
          <input type="submit" value="Select">
        </form></td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>
</html>
