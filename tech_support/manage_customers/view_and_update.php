<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');

//Get the customers ID
$customer_id=filter_input(INPUT_POST,'customer_id');
if($customer_id==null){
	//echo "nope";
} else{
	//echo $customer_id;
}

//Find customers with given ID
$query= 'SELECT * FROM customers WHERE customerID =:customer_id';
$statement = $db->prepare($query);
$statement->bindValue(':customer_id',$customer_id);
$statement->execute();
$customers=$statement->fetchAll();
$statement->closeCursor();
foreach($customers as $cus) :
$cusID=$cus['customerID'];
$first=$cus['firstName'];
$last=$cus['lastName'];
$addy=$cus['address'];
$city=$cus['city'];
$state=$cus['state'];
$post=$cus['postalCode'];
$country=$cus['countryCode'];
$phone=$cus['phone'];
$email=$cus['email'];
$pass=$cus['password'];
endforeach;
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
      <h2>View/Update Customer</h2>
      <br>
      <section id="aligned">
      <form action="update_page.php">
          <label>First Name:</label><input type="text" name="firstName" value="<?php echo $first; ?>"><br>
          <label>Last Name:</label><input type="text" name="lastName" value="<?php echo $last; ?>"><br>
          <label>Address:</label><input type="text" name="address" value="<?php echo $addy; ?>"><br>
          <label>City:</label><input type="text" name="city" value="<?php echo $city; ?>"><br>
          <label>State:</label><input type="text" name="state" value="<?php echo $state; ?>"><br>
          <label>Postal Code:</label><input type="text" name="postalCode" value="<?php echo $post; ?>"><br>
          <label>Country Code:</label><input type="text" name="countryCode" value="<?php echo $country; ?>"><br>
          <label>Phone:</label><input type="text" name="phone" value="<?php echo $phone; ?>"><br>
          <label>Email:</label><input type="text" name="email" value="<?php echo $email; ?>"><br>
          <label>Password:</label><input type="text" name="password" value="<?php echo $pass; ?>"><br>
		  <input type='hidden' name="customerID" value="<?php echo $cusID; ?>">
          <input type="submit" value="Update Customer" id="label">
          <br><br>
        </form>
    </section>
    <p><a href="search.php">Search Customers</a></p>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
