<!-- Display the products  -->
<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');

//Get all products
$queryAllProducts = 'SELECT * FROM products ORDER BY productCode';
$statement2 = $db->prepare($queryAllProducts);
$statement2->execute();
$products2=$statement2->fetchAll();
$statement2->closeCursor();
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
      <!-- display a list of categories -->
      <h2>Product List</h2>
    <section>
      <!-- display a table of products -->
      <table>
        <tr>
          <th>Code</th>
          <th>Name</th>
          <th>Version</th>
          <th>Release Date</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($products2 as $item) : ?>
          <tr>
            <td><?php echo $item['productCode']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['version']; ?></td>
            <td><?php echo $item['releaseDate']; ?></td>
            <td><form action="delete_product.php" method="post">
              <input type="hidden" name="product_code" value="<?php echo $item['productCode']; ?>">
              <input type="submit" value="Delete">
            </form></td>
          </tr>
        <?php endforeach; ?>
      </table>
      <p><a href="add_product_form.php">Add Product</a></p>
    </section>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>

