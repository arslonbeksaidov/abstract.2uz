<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="container-fluid ">
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="bootstrap/assets/css/img/arrow_icon.png"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">News</a></li>
                <li><a href="http://localhost/abstract.uz/admin/">Yangiliklar</a></li>
                <li><a href="http://localhost/abstract.uz/admin/users.php">Rubrika</a></li>
                <li><a href="#">Page 3</a></li>
            </ul>
            <form action="search.php" method="get" class="navbar-form navbar-left" role="search">
                <div class="form-group ">
                    <input type="text" name="valueToSearch" class="form-control" placeholder="Search">
                </div>
                <button type="submit" name="search" value="filter" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Page 1 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#" type="button" class="active" id="myBtn1">
                        <span class="glyphicon glyphicon-user"></span>
                        Sign Up
                    </a>
                </li>

                <?php if (isset($_SESSION["users"]) && $_SESSION["users"] != null) { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span class="glyphicon glyphicon-log-in"></span> <?= $_SESSION['users'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="structura/profil.php">Profil</a></li>

                            <li>
                                <a href="chiqish.php">Chiqish</a>
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>

                    <li>
                        <a href="#" type="button" class="active" id="myBtn">
                        <span class="glyphicon glyphicon-log-in">

                        </span> Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<?php include "login.php" ?>
<?php include "register.php" ?>

