<?php
require('../model/database.php');

//Get the customers last name
$last_name=filter_input(INPUT_POST,'lastName');

echo '<script>console.log("DO A THING")</script>';
echo "'<script>console.log(\"$last_name\")</script>'";

//Find customers with given last name
$queryLastName= 'SELECT * FROM customers WHERE 'lastName' ='$last_name'';
// $results = mysql_query('SELECT * FROM customers WHERE lastName =:last_name');
$statement = $db->prepare($queryLastName);
// $statement->bindValue(':last_name',$last_name);
$statement->execute();
$customers=$statement->fetchAll();
$statement->closeCursor();
// $customers=mysql_fetch_array($results);
//Display the Customer page
include('index.php');

?>

<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>SportsPro Technical Support</title>
  <link rel="stylesheet" type="text/css" href="../main.css"/>
</head>
<!-- the body section -->
<body>
  <main>
    <h1>SportsPro Technical Support</h1>
    <h3>Sports management software for the sports enthusiast!</h3>
      <!-- display a list of categories -->
      <h3>Customer Search</h3>
      <h3>Last Name</h3>
      <form action="search.php" method="post">
        <input type="text" name="lastName">
        <input type="submit" value="Search">
    <section>
      <!-- display a table of technicians -->
      <h2>Results</h2>
      <table>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Password</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($customers as $cus) : ?>
          <tr>
            <td><?php echo $cus['firstName']; ?></td>
            <td><?php echo $cus['lastName']; ?></td>
            <td><?php echo $cus['email']; ?></td>
            <td class="right"><?php echo $cus['city']; ?></td>
            <td><form action="view_and_update.php" method="post">
              <input type="hidden" name="customer_id" value="<?php echo $cus['customerID']; ?>">
              <input type="submit" value="Select">
            </form></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </section>
  </main>
  <footer>&copy; <?php echo data("Y"); ?> SportsPro, Inc.</p>
  </footer>
</body>
</html>
