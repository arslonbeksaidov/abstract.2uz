<?php
//var_dump($_POST);
include "../admin/NewClass.php";
$newclass=new NewClass();

include "../sql/connect_bd.php";

    $news_id = $_POST["news_id"];
    $user_id = $_POST["user_id"];
    $parent_id = $_POST["parent_id"];
    $comment = $_POST["answer_comment"];
    $user_name=$_POST["user_name"];
    $user_image=$_POST["user_image"];

    $d = substr($dete, 0, 10);


$result=$con->query("insert into comments set comment='$comment',news_id='$news_id',user_id='$user_id',parent_id='$parent_id',user_name='$user_name',user_image='$user_image',date='$d',time='$time'");
header("Location: ".$_SERVER['HTTP_REFERER']);
