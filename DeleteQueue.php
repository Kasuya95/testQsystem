<?php
require('conn.php');

$QDate = $_POST['QDate'];
$QNumber = $_POST['QNumber'];

$sql = "DELETE FROM queue  WHERE QDate=:QDate AND QNumber=:QNumber";
$stml = $conn->prepare($sql);
$stml->bindParam(':QNumber', $_GET["QNumber"]);
$stml->bindParam(':QDate', $_GET["QDate"]);

 echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
    
if($stml->execute()) :
    
        $message = "Successfully delete customer".$_GET['QNumber,QDate'].".";

else :
    $message = "Fail to delete customer information.";
endif;
$conn = null;

header("Location:index.php");

?>