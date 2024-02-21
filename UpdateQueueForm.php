<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>UpdateQueue</title>
</head>

<body>

    <?php
    require 'conn.php';

    $sql_select = 'SELECT * From queue';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

   

    if (isset($_GET['Pid'])) {
        $sql_select_customer = 'SELECT * FROM queue WHERE  Pid=?';
        $stmt = $conn->prepare($sql_select_customer);
        $stmt->execute([$_GET['Pid']]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    ?>


<div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h3>ฟอร์มแก้ไขข้อมูลคิว</h3>
                <form action="UpdateQueue.php" method="POST">

                    <label for="name" class="col-sm-5 col-form-label"> วันที่จองเข้ารับการรักษา : </label>
                    <input type="text" name="QDate" class="form-control" required value="<?= $result['QDate']; ?>"readonly>


                    <label for="name" class="col-sm-2 col-form-label"> รหัสคิว : </label>
                    <input type="text" name="QNumber" class="form-control" required value="<?= $result['QNumber']; ?>"readonly>

                    <label for="name" class="col-sm-2 col-form-label"> รหัสบัตรประชาชน : </label>
                    <input type="text" name="Pid" class="form-control" required value="<?= $result['Pid']; ?>"readonly>

                    <label for="name" class="col-sm-2 col-form-label"> สถานะ : </label>
                    <select name="Qstatus" id="Qstatus" class="form-control">
                        <option value="รอเข้ารับการรักษา">รอเข้ารับการรักษา</option>
                        <option value="รักษาเสร็จแล้ว">รักษาเสร็จแล้ว</option>
                    </select>

                    <br> <button type="submit" name="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>