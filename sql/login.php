<?php
session_start();

if (isset($_POST['qoppi'])) {
    $con = new mysqli('localhost', 'root', '', 'abstract');
    $username = $_POST['login'];
    echo $username . " " . $_POST['password'];
    $password = sha1(md5(mysqli_real_escape_string($con, $_POST['password']) . "ashdauscx"));
    echo "<br>" . $password;
    $okey = $con->query("select u.login, u.password,u.role,u.name,u.id,u.image from users as u WHERE login='$username' AND password='$password'");
    foreach ($okey as $item) {
        $_SESSION['role'] = $item['role'];
        $_SESSION['users'] = $item['name'];
        $_SESSION['images']=$item['image'];
        $_SESSION['id']= $item['id'];
        $_SESSION['arslon']= $item['id'];
        $_SESSION['time']=$dete = date("Y-m-d H:m:s");
        header('location:../index.php');
        exit();
    }
}



