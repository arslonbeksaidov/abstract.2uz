<?php
session_start();
if ($_SESSION['role'] != 4) {
    header("Location: ../index.php");
    exit();
}

$id = intval($_GET['id']);

include "../sql/connect_bd.php";
$result = $con->query("select * from users WHERE id=$id")->fetch_assoc();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Abstract</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
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
</head>

<?php include "navbar.php";?>

<?php include "../structura/login.php"; ?>
<?php include "../structura/register.php"; ?>
<br><br><br>

<div class="container">
    <br>
    <h2 class="text-center well">
        Site admin qismi
    </h2>
    <a class="btn btn-primary btn-lg" href="update_users.php?id=<?= $result['id'] ?>">O`zgartirish</a>
    <br><br>
    <div class="row">
        <table class="table table-bordered well">
            <thead>
            <tr>
                <th>Id</th>
                <th>login</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Date</th>
                <th>Tell</th>
                <th>Mail info</th>
                <th>Birthday</th>
                <th>Image</th>
                <th>Role Id</th>



            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?= $result['id'] ?></td>
                    <td><?= $result['login'] ?></td>
                    <td><?= $result['name'] ?></td>
                    <td><?= $result['surname'] ?></td>
                    <td><?= $result['date'] ?></td>
                    <td><?= $result['tel'] ?></td>
                    <td><?= $result['mail'] ?></td>
                    <td><?= $result['birthday'] ?></td>
                    <td width="20%">
                        <img src="../images/image_user/<?= $result['image']?>" width="100%" alt="">
                    </td>
                    <td><?=$result['role']?></td>

                </tr>

            </tbody>
        </table>
    </div>
</div>


</body>

</html>
