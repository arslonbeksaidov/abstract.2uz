<?php
    include "sql/connect_bd.php";
   include "sql/next.php";
?>
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
                        <a href="news.php">News</a>
                    </li>
                    <li class="list-group-item">
                        <a href="list.php">Images</a>
                    </li>
                </ul>
                <div class="panel-footer">Footer</div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <?php foreach ($result as $row): ?>
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
        <?php endforeach; ?>

        <ul class="pager">
            <!--            <li class="previous"><a href="#">Previous</a></li>-->
            <ul class="pagination">
                <?php for($i=1; $i<=$page_count; $i++):?>
                    <li <?=(isset($_GET["page"]) && intval($_GET["page"]) == $i) ? "class='active  '" : ""?>>
                        <a href="index.php?page=<?=$i?>">
                            <?=$i?>
                        </a>
                    </li>
                <?php endfor;?>
            </ul>
            <!--            <li class="next"><a href="#">Next</a></li>-->
        </ul>
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
                        <a href="news.php">News</a>
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

</div>