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
    
        $message = "Successfully delete Queue".$_GET['QNumber,QDate'].".";
        echo '
        <script type="text/javascript">        
        $(document).ready(function(){
    
            swal({
                title: "Success!",
                text: "Successfuly Delete Queue",
                type: "success",
                timer: 2500,
                showConfirmButton: false
            }, function(){
                    window.location.href = "index.php";
            });
        });                    
        </script>';

else :
    $message = "Fail to delete Queue information.";
endif;
$conn = null;


?>