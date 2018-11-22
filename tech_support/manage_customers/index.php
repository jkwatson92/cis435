<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
    <h1>SportsPro Technical Support</h1>
    <h3>Sports management software for the sports enthusiast!</h3>
      <h2>Customer Search</h2>
      <h3>Last Name</h3>
      <form action="search.php" method="post">
        <input type="text" name="lastName">
        <input type="submit" value="Search">
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
