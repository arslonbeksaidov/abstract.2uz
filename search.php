<?php
function filterNews($query)
{
    $connect = mysqli_connect("localhost", "root", "", "abstract");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
session_start();
$message = null;
$search_result = null;
if (isset($_GET['search'])) {
    $valueToSearch=$_GET['valueToSearch'];

    $query="SELECT * FROM news WHERE theme LIKE '%".$valueToSearch."%' OR short_info LIKE '%".$valueToSearch."%'";
    $search_result=filterNews($query);
}
if($search_result->num_rows == 0){
    $message = "Sizning so'rov bo'yicha ma'lumot topilmadi";
}

include "structura/head.php" ?>
<?php include "structura/navbar.php"; ?>
<br><br><br><br><br><br>
<?php if($search_result->num_rows > 0):?>
<?php while($row=mysqli_fetch_array($search_result)):?>
    <br>
    <br><br><br>
    <div class="panel panel-primary ">
        <div class="panel-heading">
            <h3 class="panel-title text-center"><?= $row['theme'] . " " . $row["id"] ?></h3>
            <div class="col-md-6 pull-left">
                <h3 class="panel-title text-left"><?= $row['number'] ?></h3>
            </div>
            <h3 class="panel-title text-right"><?= $row['rubrika_id'] ?></h3>
        </div>

        <div class="panel-body">
            <div class="col-md-4">
                <img src="images/news_image/<?= $row['image'] ?>" class="img-thumbnail" alt="Cinque Terre"
                     width="304" height="236">
            </div>
            <div class="col-md-7">
                <p style="color: #00acee" class="text-justify"><?= $row['short_info'] ?></p>
                <p class="text-right">
                    <a href="views.php?id=<?php echo $row['id']?>" class="btn btn-info">
                        To`liq
                    </a>
                </p>
            </div>
        </div>
        <div class="panel-footer">
            <b>Date: <?= $row['date'] ?></b>
            <div class="col-md-3 pull-right">
                <b>Author :<?= $row['author'] ?></b>
            </div>
            <p></p>
            <b></b>
        </div>
    </div>
<?php endwhile;?>
    <?php else:?>
<div class="container-fluid">
    <div class="alert alert-danger">
        <?=$message;?>
    </div>
</div>
    <?php endif;?>
<?php include "structura/footer.php"; ?>