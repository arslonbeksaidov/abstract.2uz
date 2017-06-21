<?php
session_start();
$id = intval($_GET['id']);
include "admin/NewClass.php";
$newclass = new NewClass();
//$newclass->db();
include "sql/connect_bd.php";
if (isset($_POST['btn'])) {
    $commenta = $_POST['comment'];
    $user = $_SESSION['id'];
    $newclass->InsertComm($id, $user, $commenta);

}
$result = $con->query("select * from news WHERE id=$id")->fetch_array();
$result1 = $con->query("select * from users WHERE id=$id")->fetch_assoc();
$pdo = new PDO("mysql:host=localhost;dbname=abstract", "root", "");
$find_comments = $pdo->query("SELECT * FROM comments WHERE news_id=$id and parent_id=0")->fetchAll();
?>
<?php include "structura/head.php"; ?>
<?php include "structura/navbar.php"; ?>
<br><br><br><br>
<div class="row">
    <div class="col-md-3">
        <div class="panel-default">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">Mensu</a>
                    </h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="structura/news.php">News</a>
                    </li>
                    <li class="list-group-item">
                        <a href="list.php">Images</a>
                    </li>
                </ul>
                <div class="panel-footer">Footer</div>
            </div>
        </div>
    </div>
    <div class="col-md-6 ">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h3 class="panel-title text-center"><?= $result['theme'] . " " . $result["id"] ?></h3>
                <div class="col-md-6 pull-left">
                    <h3 class="panel-title text-left"><?= $result['number'] ?></h3>
                </div>
                <h3 class="panel-title text-right"><?= $result['rubrika_id'] ?></h3>
            </div>
            <div class="panel-body col-md-12">
                <img src="images/news_image/<?= $result['image'] ?>" class="img-thumbnail" alt="Cinque Terre"
                     width="700" height="850">
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <p style="color: #00acee" class="text-justify"><?= $result['full_info'] ?></p>
                </div>
            </div>
            <div class="panel-footer">
                <div class="col-md-3 ">

                    <b class=" label label-primary">Date:<?= $result['date'] ?></b>
                </div>
                <div class="col-md-6 text-center ">
                    <br>
                    <span class="label label-primary ">Ko`rishlar soni :</span>
                </div>
                <div class=" col-md-3 ">
                    <b class="label label-primary">Author :<?= $result['author'] ?></b>
                </div>
                <br>
                <br>
            </div>
        </div>
        <?php

        foreach ($find_comments as $row): ?>
           <div class="media">
                <div class="media-left">
                    <img src="images/image_user/<?= $row['user_image'] ?>" class="media-object img-thumbnail"
                         style="width: 80px">
                </div>
                <div class="media-body">
                    <h4 style="color: inherit" class="media-heading">
                        <small><i>
                                <?php
                                echo '<h1 style="color: white">' . $row['user_name'] . '</h1>  ';


                                echo $row['comment'];

                                $result2=$pdo->query("select * from comments where parent_id='".$row['id']."'")->fetchAll();
                                if(!empty($result2)){
                                    foreach($result2 as $row1){
                                     echo    '<div class="alert alert-danger">'.$row1['user_name'].'</div>';

                                        echo '<div class="alert alert-info">'.$row1['comment'].'</div>';
                                    }
                                }
                                 ?>
                            </i></small>
                    </h4>
            <?php
                    if (isset($_SESSION['id']) && !is_null($_SESSION["id"])):
                    ?>
                    <span data-id="<?=$row["id"]?>" class="btn btn-info pull-right answer_btn">Javob yozish</span>
                    <div style="display: none" data-id="<?=$row["id"]?>">
                        <form action="./sql/add_comment.php" method="post">
                            <textarea name="answer_comment"></textarea>
                            <input type="hidden" name="parent_id" value="<?=$row["id"]?>">
                            <input type="hidden" name="news_id" value="<?=$id?>">
                            <input type="hidden" name="user_id" value="<?=$_SESSION["id"]?>">
                            <input type="hidden" name="user_name" value="<?=$_SESSION["users"]?>">
                            <input type="hidden" name="user_image" value="<?=$_SESSION["images"]?>">
                            <input type="submit">
                            <span class="btn btn-link cancel" data-id="<?=$row["id"]?>">Bekor qilish</span>
                        </form>
                    </div>
                    <?php endif;?>
                </div>
            </div>

        <?php endforeach; ?>
        <?php
        if (isset($_SESSION['id']) && !is_null($_SESSION["id"])):
            ?>
            <form action="" method="post">
                <textarea name="comment" id="" cols="50" rows="2" placeholder="Enter comment"
                          required></textarea><br><br>
                <button type="submit" class="btn btn-primary" name="btn">
                    Qo'shish
                </button>
            </form>
        <?php endif; ?>
    </div>
    <div class="col-md-3">
        <div class="panel-default">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h3 align="center" class="panel-title ">
                        <a data-toggle="collapse" href="#collapse1">Menu</a>
                    </h3>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="list-group-item">
                        <a href="structura/news.php">News</a>
                    </li>
                    <li class="list-group-item">
                        <a href="list.php">Images</a>
                    </li>
                </ul>
                <div class="panel-footer">Footer</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".answer_btn").click(
        function(){
            var id = $(this).data("id");
            $("div[data-id="+id+"]").css({"display":"block"});
        }
    );
    $("body").on("click",".cancel",function(){
        var id=$(this).data("id");
        $("div[data-id="+id+"]").css({"display":"none"});
    });
</script>
