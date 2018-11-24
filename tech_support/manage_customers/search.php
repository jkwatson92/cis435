<?php
require('../model/database.php');

//Get the customers last name
$last_name=filter_input(INPUT_POST,'lastName');

echo '<script>console.log("DO A THING")</script>';
echo "'<script>console.log(\"$last_name\")</script>'";

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
      <!-- display a table of technicians -->
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
            <?php $first=$cus['firstName'];
                  $last=$cus['lastName'];
                  $fullName=$first.' '.$last;
                  ?>
            <td><?php echo $fullName ?></td>
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
</body>
</html>
