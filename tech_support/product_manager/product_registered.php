<?php

$cID=filter_input(INPUT_POST,'custID');
$productCode=filter_input(INPUT_POST, 'product');

if($productCode==null || $cID==null){
  $error="Invalid product data. Check all fields and try again.";
  header('location ../errors/error.php');
}
else{
  require_once('../model/database.php');


//Date Information
$openDate = date('Y-m-d H:i:s');

//Add the product to the database
$query='INSERT INTO registrations (customerID, productCode, registrationDate)
  VALUES(:customerID, :productCode, :registrationDate)';

$statement = $db->prepare($query);

$statement->bindValue(':customerID',$cID);
$statement->bindValue(':productCode',$productCode);
$statement->bindValue(':registrationDate',$openDate);
$statement->closeCursor();
}

include '../view/header.php';

?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
  <main>
    <section>
      <!-- display a table of technicians -->
      <h2>Register Product</h2>
      <div>
        Product (<?php echo $productCode; ?>) was registered successfully.
      </div>
    </section>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
