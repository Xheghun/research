<!DOCTYPE html>
<html>
<head>
    <?php
    include "includes/head.php";
    if (!is_logged_in()) {
        redirect("../login.php");
    }
    ?>
</head>
<body>
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-3 card stylish-color-dark">
            <div class="">
                <div class="left">
                    <a href="#"><h2 class="font-weight-bold text-md-left white-text p-3">ProjectX</h2></a>
                </div>
                <hr class="m-1"/>
                <div class="p-2 mt-2">
                    <img class="round-corner" style="height: 50px; width: 50px"
                         src="img/user.png"><span><?php echo $_SESSION['projectx_email'] ?></span>
                </div>
                <hr class="m-1"/>
                <ul class="nav-pills container-fluid">
                    <li class="active side-nav nav-item"><a href="../Admin" class="nav-link">Dashboard</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="problems.php">Problems
                            <span style="border-radius: 100%;" class="p-1 red"><?php echo row_nums(); ?></span>
                        </a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Ideas</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Contacts</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-door-open"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="">
                <h2 class="p-2 font-weight-bold">Recent Activities</h2>
                <hr class="my-1"/>
                <div class="row">
                    <div class="col-md-6 m-3">
                        <div class="card p-2">
                            <input hidden id="problems" value="<?php echo count_problems() ?>">
                            <input hidden id="ideas" value="<?php echo count_ideas() ?>"/>
                            <h4 class="font-weight-normal">Projects</h4>
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-5 m-3">
                        <div class="card p-2">
                            <h4 class="font-weight-normal">Contacts</h4>
                            <h1 class="text-center font-weight-bold"><?php echo count_contacts() ?></h1>
                            <hr class="my-2"/>
                            <?php if (count_contacts() <= 0) { ?>
                                <button disabled class="btn btn-block btn-outline-red"><a>View Contacts<a/></button>
                            <?php } else { ?>
                                <button class="btn-block btn btn-outline-red"><a href="index.php">View Contacts</a>
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <hr class="my-2"/>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card p-2">
                            <canvas style="height: 6cm" id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/scripts.php" ?>
</body>
</html>