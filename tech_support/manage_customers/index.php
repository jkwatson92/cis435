<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
      <h2>Customer Search</h2>
      Last Name
      <div>
        <form action="search.php" method="post">
        <input type="text" name="lastName">
        <input type="submit" value="Search">
      </div>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
