<?php
session_start();
if ($_SESSION['role'] != 4) {
    header("Location: ../index.php");
    exit();
}
$new_id = $_GET['id'];
include "../sql/connect_bd.php";
$result = $con->query("select * from news WHERE id='$new_id'")->fetch_assoc();
if (isset($_POST['submit'])) {
    $rasm = $_FILES['file']['name'];
    $upload = "../images/news_image/";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload . basename($_FILES['file']['name']));
    $maz = $_POST['mavzu'];
    $text = $_POST['texti'];
    $odam = $_POST['odam'];
    $date = $_POST['date'];
    $rubrika = $_POST['rubrika'];
    $number = $_POST['number'];
    $info = $_POST['full'];
    $okey = $con->query("update news set theme='$maz',short_info='$text', date='$date', author='$odam', rubrika_id='$rubrika', number='$number', image='$rasm', full_info='$info' WHERE id='$new_id'");
    if ($okey)
        header('location:index.php');
}
?>
<html>
<haed>
    <title>Update</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color: white !important;
            text-align: center;
            font-size: 30px;
            background-image: url("../images/news_image/gerb.jpeg");
        }

        .modal-footer {
            background-color: #f9f9f9;
            background-image: url("../images/news_image/gerb.jpeg");
        }

        body {
            background-image: url("../images/news_image/odom.jpg");
            background-attachment: fixed;
        }
    </style>
</haed>
<body>
<?php include "navbar.php"; ?>
<h1 align="center">O`zgartirish</h1>
<div class="container">
    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post">

        <div class="form-group has-success has-feedback">
            <label class="col-sm-2 control-label" for="inputSuccess"><a href="#">Mavzu</a> </label>
            <div class="col-sm-10">
                <input value="<?= $result['theme'] ?>" type="text" class="form-control" id="inputSuccess" name="mavzu">
                <span class="glyphicon glyphicon-ok-sign form-control-feedback"></span>

            </div>
        </div>
        <div class="form-group has-warning has-feedback">
            <label class="col-sm-2 control-label" for="exampleinputfile"><a href="#">rasm</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['image'] ?>" type="file" class="form-control" id="exampleinputfile"
                       name="file">
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">Text</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['short_info'] ?>" type="text" class="form-control" id="inputError"
                       name="texti">
                <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="id_date"><a href="#">Sana</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['date'] ?>" type="datetime" class="form-control" id="inputError" name="date">
                <span class="glyphicon glyphicon-time form-control-feedback"></span>
            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">author</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['author'] ?>" type="text" class="form-control" id="inputError" name="odam">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>

            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">author</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['rubrika_id'] ?>" type="text" class="form-control" id="inputError"
                       name="rubrika">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">number</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['number'] ?>" type="text" class="form-control" id="inputError" name="number">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>
        </div>
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">fULL INFO</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['full_info'] ?>" type="text" class="form-control" id="inputError" name="full">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2">
                <button class="col-md-2 btn btn-success" style="margin-left: 15px" type="submit" name="submit">
                    Saqlash
                </button>
            </div>
        </div>
    </form>

</div>
</body>
</html>
