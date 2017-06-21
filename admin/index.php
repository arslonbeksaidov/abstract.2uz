<?php
session_start();
if ($_SESSION['role'] != 4) {
    header("Location: ../index.php");
    exit();
}

include "../sql/connect_bd.php";

$result = $con->query("select * from news");
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

<body>
<nav class="navbar navbar-inverse navbar-fixed-top navbar" role="navigation">

    <div class="container-fluid ">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="../bootstrap/assets/css/img/arrow_icon.png">Admin</a>

        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">News</a></li>
                <li><a href="">Yangiliklarni Boshqarish</a></li>
                <li><a href="http://localhost/abstract.uz/admin/users.php">Foydalanuvchilarni boshqarish</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" type="button" class="active" id="myBtn1">
                        <span class="glyphicon glyphicon-user"></span>
                        Sign Up
                    </a>
                </li>
                <li>
                    <?php if(isset($_SESSION["users"])&&$_SESSION["users"]!=null){?>
                        <a href="../sql/chiqish.php" type="button" class="active">
                            <span class="glyphicon glyphicon-log-in"></span> <?= $_SESSION['users'] ?></a>
                    <?php } else { ?>
                    }
                    <a href="#" type="button" class="active" id="myBtn">
                        <span class="glyphicon glyphicon-log-in">

                        </span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </div>

</nav>
<?php include "../structura/login.php"; ?>
<?php include "../structura/register.php"; ?>
<br><br><br>

<div class="container">
    <br>
    <h2 class="text-center well">
        Site admin qismi
    </h2>
    <a class="btn btn-primary btn-lg" href="create.php">Yangilik qo'shish</a>
    <br><br>
    <div class="row">
        <table class="table table-bordered well">
            <thead>
            <tr>
                <th>Id</th>
                <th>Number</th>
                <th>theme</th>
                <th>Date</th>
                <th>Image</th>
                <th>author</th>
                <th>Short info</th>
                <th>full info</th>
                <th>rubrika id</th>
                <th>O'zgartirish</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['number'] ?></td>
                    <td><?= $row['theme'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['image'] ?></td>
                    <td><?= $row['author'] ?></td>
                    <td><?= $row['short_info'] ?></td>
                    <td><?= $row['full_info'] ?></td>
                    <td><?= $row['rubrika_id'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="delete.php?act=deletenews&id=<?= $row['id'] ?>"><span
                                class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>


</body>
