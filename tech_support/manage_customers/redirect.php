<?php
if(isset($_POST["submit"])){
// Fetching variables of the form which travels in URL
//  To redirect form on a particular page
$custID=$_POST['customer_id'];
header("Location: view_and_update.php?custID=$custID");
}

?>
