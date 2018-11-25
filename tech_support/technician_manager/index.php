<!-- Display the technicians  -->
<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');

//Get all technicians
$queryAllTechs = 'SELECT * FROM technicians ORDER BY techID';
$statement2 = $db->prepare($queryAllTechs);
$statement2->execute();
$technicians=$statement2->fetchAll();
$statement2->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
      <!-- display a list of categories -->
      <h2>Technician List</h2>
    <section>
      <!-- display a table of technicians -->
      <table>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Password</th>
          <th>&nbsp;</th>
        </tr>
        <?php foreach($technicians as $tech) : ?>
          <tr>
            <td><?php echo $tech['firstName']; ?></td>
            <td><?php echo $tech['lastName']; ?></td>
            <td><?php echo $tech['email']; ?></td>
            <td><?php echo $tech['phone']; ?></td>
            <td class="right"><?php echo $tech['password']; ?></td>
            <td><form action="delete_tech.php" method="post">
              <input type="hidden" name="tech_id" value="<?php echo $tech['techID']; ?>">
              <input type="submit" value="Delete">
            </form></td>
          </tr>
        <?php endforeach; ?>
      </table>
      <p><a href="add_tech_form.php">Add Technician</a></p>
    </section>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
