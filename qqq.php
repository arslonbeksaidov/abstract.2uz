<!--<div class="header">
    <br>
    <img src="" class="center-block">
</div>-->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:border-box" role="navigation">
    <div class="container-fluid ">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="bootstrap/assets/css/img/arrow_icon.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav" data-toggle="dropdown">
                <li class="active"><a href="#">News</a></li>
                <li><a href="#">Page </a></li>
                <li><a href="#">Page 2</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group ">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" id="qwerty" class="btn btn-default">Submit</button>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown ">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" href="#">Page1</a>
                    <ul class="dropdown-menu">
                        <li><a  class="glyphicon glyphicon-education" href="#"> Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>

                </li>

                <li><a href="#" type="button" class="active" id="myBtn1">
                        <i class="glyphicon glyphicon-user"></i>
                        Sign Up
                    </a>
                </li>
                <li>
                    <?php if (isset($_SESSION["users"]) && $_SESSION['users'] != null) { ?>
                        <a href="sql/chiqish.php" type="button" class="active">
                            <span class="glyphicon glyphicon-log-in"></span> <?= $_SESSION['users'] ?></a>
                    <?php } else { ?>
                        <a href="#" type="button" class="active" id="myBtn">
                            <span class="glyphicon glyphicon-log-in"></span> Login</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>

</nav>

<?php include "login.php" ?>
<?php include "register.php" ?>


