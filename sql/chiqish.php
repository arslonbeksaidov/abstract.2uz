<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 03.02.2017
 * Time: 17:51
 */
session_start();
$_SESSION['users'] = null;
$_SESSION['role'] = null;
$_SESSION["id"] = null;
unset($_SESSION);
session_destroy();
header('location:../index.php');