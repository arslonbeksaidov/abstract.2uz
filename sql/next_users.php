<?php
$count = $con->query("SELECT COUNT(*) as cnt FROM users")->fetch_assoc();
$count = $count["cnt"];
$sahifa = 7; // har sahifadagi news soni
$page_count = ceil($count / $sahifa);
$page = (isset($_GET["page"])) ? $_GET["page"] : 1;
$start = $sahifa * ($page-1);
$result = $con->query("SELECT * FROM users ORDER BY id DESC LIMIT $start, $sahifa");
?>

