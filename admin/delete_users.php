<?php
include "../sql/connect_bd.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'deleteusers': {

            $new_id = (int)$_GET['id'];

            $con->query("DELETE FROM users WHERE id = $new_id");
            header("Location: " . $_SERVER['HTTP_REFERER']);
            break;
        }

    }
}


?>