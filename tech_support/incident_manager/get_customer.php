<?php
require('../model/database.php');

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

//Get Customers email
$cust_email=filter_input(INPUT_POST,'custEmail');

//Verify Customer with that Email Exists
$queryCustomerEmail = 'SELECT * FROM customers WHERE email =:cust_email';

//Select Customer Information
$statement = $db->prepare($queryCustomerEmail);
$statement->bindValue(':cust_email',$cust_email);
$statement->execute();
$customer=$statement->fetchAll();
$statement->closeCursor();

$cID = "";
$fname = "";
$lname = "";
$email = "";

foreach($customer as $cust => $cValue):
  $cID = $cValue['customerID'];
  $fname = $cValue['firstName'];
  $lname = $cValue['lastName'];
  $email = $cValue['email'];
endforeach;

//Redirect to Login Page if login incorrect
if($email != $cust_email){
  header('location: index.php');
}

//Select Product Information for the Dropdown Selector
$queryProductDD = 'SELECT * FROM products';

$statement = $db->prepare($queryProductDD);
$statement->execute();
$products=$statement->fetchAll();
$statement->closeCursor();



?>

<?php include '../view/header.php'; ?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
    <section>
      <!-- display a table of technicians -->
      <h2>Create Incident</h2>
      <div>
        <form id="createIncident" action="add_incident.php" method="post" >
          <label for="customerName"> Customer:</label>
            <?php echo $fname;
                  echo " ";
                  echo $lname; ?>
          <input type="hidden" name="custID" value=<?php echo $cID; ?>
          <br> <br>
          <label for="product"> Product: </label>
            <select name="product">
              <option value="">-------------------</option>
              <?php
              foreach($products as $prod => $pname):
                echo '<option value="'.$pname[productCode].'">'.$pname[name].'</option>';
              endforeach;
              ?>
            </select>
            <br><br>
            <label for="title"> Title:</label> <input name="title" type="text">
            <br> <br>
            <label for="description"> Description:</label>
            <br>
            <textarea name="description" form="createIncident" value="description" rows="10" cols="30"> What's the issue? </textarea>
            <br> <br>
            <input type="submit" value="Create Incident">
        </form>
      </div>
    </section>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
