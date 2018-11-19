<?php
require('../model/database.php');
$query='SELECT * FROM technicians ORDER BY techID';
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
  <header><h1>Technician Manager</h1></header>
  <main>
    <h1>Add Technician</h1>
    <form action="add_technician.php" method="post" id="add_tech_form">
      <label>First Name:</label>
      <input type="text" name="firstName"><br>
      <label>Last Name:</label>
      <input type="text" name="lastName"><br>
      <label>Email:</label>
      <input type="text" name="email"><br>
      <label>Phone:</label>
      <input type="text" name="phone"><br>
      <label>Password:</label>
      <input type="text" name="password"><br>
      <label>&nbsp;</label>
      <input type="submit" value="Add Technician"><br>
    </form>
    <p><a href="index.php">View Technician List</a></p>
  </main>
  <footer>
    <p>&copy;<?php echo date("Y"); ?> SportsPro, Inc.</p>
  </footer>
</body>
</html>
