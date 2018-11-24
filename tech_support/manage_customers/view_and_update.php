<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');

//Get the customers ID
$customer_id=filter_input(INPUT_POST,'customerID');
echo '<script>console.log("view/update")</script>';

//Find customers with given ID
$query= 'SELECT * FROM customers WHERE customerID =:customer_id';
$statement = $db->prepare($query);
$statement->bindValue(':customer_id',$customer_id);
$statement->execute();
$customers=$statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
      <h2>View/Update Customer</h2>
      <br>
      <section id="aligned">
      <form action="/update_page.php">
          <label>First Name:</label><input type="text" name="firstName" value="<?php echo $customers['firstName']; ?>"><br>
          <label>Last Name:</label><input type="text" name="lastName"><br>
          <label>Address:</label><input type="text" name="address"><br>
          <label>City:</label><input type="text" name="city"><br>
          <label>State:</label><input type="text" name="state"><br>
          <label>Postal Code:</label><input type="text" name="postalCode"><br>
          <label>Country Code:</label><input type="text" name="countryCode"><br>
          <label>Phone:</label><input type="text" name="phone"><br>
          <label>Email:</label><input type="text" name="email"><br>
          <label>Password:</label><input type="text" name="password"><br>
          <input type="submit" value="Update Customer" id="label">
          <br><br>
        </form>
    </section>
    <p><a href="search.php">Search Customers</a></p>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
