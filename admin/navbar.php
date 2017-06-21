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



<?php include "login.php" ?>
<?php include "register.php" ?>

