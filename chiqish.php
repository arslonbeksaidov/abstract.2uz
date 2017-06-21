<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 03.02.2017
 * Time: 17:51
 */
session_start();
session_destroy();
header('location:index.php');