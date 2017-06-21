<?php include "connect_bd.php";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $ism = mysqli_real_escape_string($con, $_POST['name']);
    $familiya = mysqli_real_escape_string($con, $_POST['surname']);
    $tel = mysqli_real_escape_string($con, $_POST['tel']);
    $mail = mysqli_real_escape_string($con, $_POST['mail']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    $rasm = $_FILES['file']['name'];
    $upload = "../images/image_user/";
    $role="1";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload . basename($_FILES['file']['name']));
    $pass = sha1(md5(mysqli_real_escape_string($con, $_POST['pass']) . "ashdauscx"));
    $okey = $con->query("insert INTO  users (login, `name`, surname, tel,mail,birthday,image,password,role) VALUES ('$username','$ism', '$familiya','$tel', '$mail', '$birthday','$rasm','$pass','$role')");

    if ($okey)
        header('location:../index.php');
} else header('location:qqq1.php');
    ?>
   <?php
