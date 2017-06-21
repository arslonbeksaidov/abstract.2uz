<?php

class NewClass
{ private $host = "localhost";
    private $root = "root";
    private $psw = "";
    private $dbname = "abstract";
    private $connect = null;
    public function db()
    {
        $this->connect = new mysqli($this->host, $this->root, $this->psw, $this->dbname);
    }

    public function Select()
    {
        $result = $this->connect->query("select * from users WHERE id");
        return $result;
    }

    public function InsertComm($idnews, $iduser, $com)
    {
        $uss = $_SESSION["users"];
        $images = $_SESSION["images"];
        $dete = date("Y-m-d H:m:s");
        $d = substr($dete, 0, 10);
        $time = substr($dete, 11, 8);
        $this->connect->query("insert into comments set user_image='$images',news_id='$idnews', user_id='$iduser',user_name='$uss', comment='$com ',`date`='$d',`time`='$time',parent_id=0");
    }
    public function filterNews($query)
    {
        $connect = mysqli_connect("localhost", "root", "", "abstract");
        $filter_Result = mysqli_query($connect, $query);
        return $filter_Result;
    }
}
