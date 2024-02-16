<?php

if (isset($_POST['submit'])) {
    require 'conn.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $QDate = $_POST['QDate'] ;
    $QNumber = $_POST['QNumber'] ;
    $Pid = $_POST['Pid'] ;
    $Qstatus = $_POST['Qstatus'] ;

    $stmt = $conn->prepare(
        'UPDATE queue set Qstatus = :QStatus where QDate = :QDate'
    );
    $stmt->bindParam(':QDate', $QDate);
    $stmt->bindParam(':QStatus', $Qstatus);


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute() ) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}