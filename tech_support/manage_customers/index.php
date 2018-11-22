<!-- Display the technicians  -->
<?php
require('../model/database.php');
//Get name for selected category
// $queryCustomers = 'SELECT * FROM customers WHERE customerID =: customer_id';
// $statement1 = $db->prepare($queryCustomers);
// $statement1->bindValue(':customer_id',$customer_id);
// $statement1->execute();
// $customers = $statement1->fetch();
// $customerID_name = $customers['customerID'];
// $statement1->closeCursor();
//
// //Get all customers
// $queryAllCustomers = 'SELECT * FROM customers ORDER BY customerID';
// $statement2 = $db->prepare($queryAllCustomers);
// $statement2->execute();
// $allCustomers=$statement2->fetchAll();
// $statement2->closeCursor();
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
      <h2>Customer Search</h2>
      <h3>Last Name</h3>
      <form action="search.php" method="post">
        <input type="text" name="lastName" value="<?php echo $last_name; ?>">
        <input type="submit" value="Search">
    <section>
      <!-- display a table of customers -->
      <h2>Results</h2>
      <!-- <h2><?php echo $customerID_name; ?></h2> -->
      <table>
        <tr>
          <th>Name</th>
          <th>Email Address</th>
          <th>City</th>
          <th>&nbsp;</th>
        </tr>
        <!-- <?php foreach($allCustomers as $cus) : ?>
          <?php $first=$cus['firstName'];
                $last=$cus['lastName'];
                $whole_name= $first." ".$last;?> -->
          <tr>
            <!-- <td><?php echo $whole_name; ?></td> -->
            <!-- <td><?php echo $cus['email']; ?></td> -->
            <!-- <td class="right"><?php echo $cus['city']; ?></td> -->
            <td><form action="search.php" method="post">
              <input type="hidden" name="last_name" value="<?php echo $cus['lastName']; ?>">
              <input type="submit" value="Select">
            </form></td>
          </tr>
        <!-- <?php endforeach; ?> -->
      </table>
    </section>
  </main>
  <footer>&copy; <?php echo data("Y"); ?> SportsPro, Inc.</p>
  </footer>
</body>
</html>
