<?php
session_start();
if ($_SESSION['role'] != 4) {
    header("Location: ../index.php");
    exit();
}
include "../sql/connect_bd.php";

include "../sql/next_users.php";

/*include "NewClass.php";
$isop=new NewClass();
$isop->db();
$result = $isop->Select();*/
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
</html>
<body>
<br><br>
<?php include "navbar.php";?>
<?php include "../structura/login.php"; ?>
<?php include "../structura/register.php"; ?>



<div class="container">
    <br>
    <h2 class="text-center well">
        Site admin qismi
    </h2>
<!--    <a class="btn btn-primary btn-lg" href="create.php">Foydalanuvchi qo`shish yoki admin qoshish</a>-->
<!--    <br><br>-->
    <div class="row">
        <table class="table table-bordered well">
            <thead>
            <tr>
                <th>Id</th>
                <th>Rasm</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Date</th>
                <th>Tel</th>
                <th>mail</th>
                <th>birthday</th>
<!--                <th>image</th>-->
<!--                <th>password</th>-->
                <th>Role</th>
                <th>
                    Changed
                </th>

            </tr>
            </thead>
            <tbody class="">
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td width="20%">
                        <img src="../images/image_user/<?= $row['image']?>" width="100%" alt="">
                    </td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['surname'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['tel'] ?></td>
                    <td><?= $row['mail'] ?></td>
                    <td><?= $row['birthday'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td>

                        <a href="update_users.php?id=<?= $row['id'] ?>"><span class="btn btn-primary ">O`zgartirish</span></a>
                        <br>
                        <br>
                        <a href="delete_users.php?act=deleteusers&id=<?= $row['id'] ?>"
                                class=" btn btn-danger">
                            O`chirish

                        </a>
                        <br>
                        <br>

                        <a href="view_users.php?id=<?php echo $row['id']?>" class="btn btn-info">
                            To`liq
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>

</div>
<ul class="pager">
    <!--            <li class="previous"><a href="#">Previous</a></li>-->
    <ul class="pagination">
        <?php for($i=1; $i<=$page_count; $i++):?>
            <li <?=(isset($_GET["page"]) && intval($_GET["page"]) == $i) ? "class='active  '" : ""?>>
                <a href="users.php?page=<?=$i?>">
                    <?=$i?>
                </a>
            </li>
        <?php endfor;?>
    </ul>
    <!--            <li class="next"><a href="#">Next</a></li>-->
</ul>


</body>