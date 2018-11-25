<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
      <h2>Get Customer</h2>
      You must enter the customer's email address to select the customer. (For the incident)
      <div>
        <form action="get_customer.php" method="post">
        <label for="get_customer.php">Email: </label>
        <input type="text" name="custEmail">
        <input type="submit" value="Get Customer">
      </div>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
