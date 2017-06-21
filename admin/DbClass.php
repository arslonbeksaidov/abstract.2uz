<?php

/**
 * Created by PhpStorm.
 * User: apple
 * Date: 06.05.2017
 * Time: 5:32
 */
class DbClass
{

    private $host = "localhost";
    private $root = "root";
    private $psw = "";
    private $dbname = "abstract";

    private $connect = null;

    public function getConnection(){
        $this->connect = new mysqli($this->host, $this->root, $this->psw, $this->dbname);
        return $this->connect;
    }


}