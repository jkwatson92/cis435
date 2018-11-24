<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');
$query='SELECT * FROM products ORDER BY productCode';
$statement =$db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html>
<head>
  <title>SportsPro Technical Support</title>
  <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
  <header><h1>Product Manager</h1></header>
  <main>
    <h1>Add Product</h1>
    <form action="add_product.php" method="post" id="add_product_form">
      <label>Product Code:</label>
      <input type="text" name="productCodeIn"><br>
      <label>Product Name:</label>
      <input type="text" name="name"><br>
      <label>Version:</label>
      <input type="text" name="version"><br>
      <label>Release Date:</label>
      <input type="text" name="releaseDate"><br>
      <label>&nbsp;</label>
      <input type="submit" value="Add Product"><br>
    </form>
    <p><a href="index.php">View Product List</a></p>
  </main>
</body>
</html>
