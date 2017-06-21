<?php
session_start();
$id = $_SESSION['arslon'];
include "../sql/connect_bd.php";
if (isset($_POST['submit'])) {
    $rasm = $_FILES['file']['name'];
    $upload = "../images/image_user/";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload . basename($_FILES['file']['name']));
    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $date = $_POST['date'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $birthday=$_POST['birthday'];
    $role=$_POST['roles'];
    $okey = $con->query("update users set login='$login',name='$name', surname='$surname', date='$date', tel='$tel', mail='$mail', image='$rasm' WHERE  id='$id'");
    if ($okey)
        header('Location: ../index.php');
}
$result = $con->query("select * from users WHERE id='$id'")->fetch_assoc();
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
        //--------------------------------------------------------------------------------------------------------Login
        <div class="form-group has-success has-feedback">
            <label class="col-sm-2 control-label" for="inputSuccess"><a href="#">Login</a> </label>
            <div class="col-sm-10">
                <input value="<?= $result['login'] ?>" type="text" class="form-control" id="inputSuccess" name="login">
                <span class="glyphicon glyphicon-ok-sign form-control-feedback"></span>

            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------Name
        <div class="form-group has-warning has-feedback">
            <label class="col-sm-2 control-label" for="exampleinputfile"><a href="#">Name</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['name'] ?>" type="text" class="form-control" id="exampleinputfile"
                       name="name">
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------surname
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">Surname</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['surname'] ?>" type="text" class="form-control" id="inputError"
                       name="surname">
                <span class="glyphicon glyphicon-text-width form-control-feedback"></span>
            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------date
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="id_date"><a href="#">Date</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['date'] ?>" type="datetime" class="form-control" id="inputError" name="date">
                <span class="glyphicon glyphicon-time form-control-feedback"></span>
            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------tel
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">Tel</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['tel'] ?>" type="text" class="form-control" id="inputError" name="tel">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>

            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------mail
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">Mail</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['mail'] ?>" type="text" class="form-control" id="inputError"
                       name="mail">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>
        </div>
        //--------------------------------------------------------------------------------------------------------birthday
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">Birtday</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['birthday'] ?>" type="text" class="form-control" id="inputError" name="birthaday">
                <i class="glyphicon glyphicon-user form-control-feedback"></i>
            </div>
        </div>
        //----------------------------------------------------------------------------------------------------------image
        <div class="form-group has-error has-feedback">
            <label class="col-sm-2 control-label" for="inputError"><a href="#">rasm</a></label>
            <div class="col-sm-10">
                <input value="<?= $result['image'] ?>" type="file" class="form-control" id="inputError" name="file">
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
