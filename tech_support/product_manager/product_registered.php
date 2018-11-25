<?php

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

$cID=filter_input(INPUT_POST,'custID');
$productCode=filter_input(INPUT_POST, 'product');

debug_to_console( $cID );
debug_to_console( $productCode );

if($productCode==null || $cID==null){
  $error="Invalid product data. Check all fields and try again.";
  header('location ../errors/error.php');
}
else{
  require_once('../model/database.php');


//Date Information
$openDate = date('Y-m-d H:i:s');
debug_to_console( $openDate );

//Add the product to the database
$query='INSERT INTO registrations (customerID, productCode, registrationDate)
  VALUES(:customerID, :productCode, :registrationDate)';

$statement = $db->prepare($query);

$statement->bindValue(':customerID',$cID);
$statement->bindValue(':productCode',$productCode);
$statement->bindValue(':registrationDate',$openDate);
debug_to_console($statement->execute());
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
