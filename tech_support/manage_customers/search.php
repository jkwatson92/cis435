<?php
//$_POST = array();
require('../model/database.php');

//Get the customers last name
$last_name=filter_input(INPUT_POST,'lastName');

echo $last_name;

//Find customers with given last name
$queryLastName= 'SELECT * FROM customers WHERE lastName =:last_name';
// $results = mysql_query('SELECT * FROM customers WHERE lastName =:last_name');
$statement = $db->prepare($queryLastName);
$statement->bindValue(':last_name',$last_name);
$statement->execute();
$customers=$statement->fetchAll();
$statement->closeCursor();

//Display the Customer page
include('index.php');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
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
          <tr>
            <td><?php echo $cus['firstName'].' '.$cus['lastName']; ?></td>
            <td><?php echo $cus['email']; ?></td>
            <td class="right"><?php echo $cus['city']; ?></td>
            <td><form action="view_and_update.php" method="post">
              <input type="hidden" name="customer_id" value="<?php echo $cus['customerID']; ?>">
              <input name="submit" type="submit" value="Select">
				<?php
					include "redirect.php";
				?>
            </form></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </section>
  </main>
</body>
</html>
