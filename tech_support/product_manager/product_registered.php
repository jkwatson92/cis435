<?php include '../view/header.php';

$cID=filter_input(INPUT_POST,'custID');
$productCode=filter_input(INPUT_POST, 'productCode');

if($productCode==null || $fname==null || $lname==null){
  $error="Invalid product data. Check all fields and try again.";
  include('../errors/error.php');
}
else{
  require_once('../model/database.php');
}

//Date Information
$openDate = date('Y-m-d H:i:s');


//Add the product to the database
$query='INSERT INTO registrations (customerID, productCode, registrationDate)
  VALUES(:cID, :product, :openDate)';

$statement = $db->prepare($query);

debug_to_console($openDate);

$statement->bindValue(':cID',$cID);
$statement->bindValue(':product',$product);
$statement->bindValue(':openDate',$openDate);
$statement->execute();
$statement->closeCursor();

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
        //TODO: Check PHP Injection Here
        Product (<?php echo $productCode; ?>) was registered successfully.
      </div>
    </section>
  </main>
</body>
</html>
<?php include '../view/footer.php'; ?>
