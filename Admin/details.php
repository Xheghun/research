<!DOCTYPE html>
<html>
<head>
    <?php
    include "includes/head.php";
    if (!is_logged_in()) {
        redirect("../login.php");
    }
    $title = base64_decode(filter_input(INPUT_GET, "title", FILTER_SANITIZE_SPECIAL_CHARS));
    $id = base64_decode(filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS));
    $email = base64_decode(filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL));
    ?>
</head>
<body>
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-2 card stylish-color-dark">
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
                    <li class="side-nav nav-item"><a href="../Admin" class="nav-link"><i
                                    class="fa fa-dashboard mr-1"></i>Dashboard</a></li>
                    <li class="active side-nav nav-item">
                        <a class="nav-link" href="problems.php"><i class="fa fa-"></i>Problems
                            <span class="red balloon"><?php echo row_nums("problems"); ?></span></a>
                    </li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Ideas
                            <span class="red balloon"><?php echo row_nums("ideas") ?></span></a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#"><i
                                    class="fa fa-user mr-1"></i>Contacts</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="logout.php"><i
                                    class="fa fa-door-open mr-1"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card p-3">
                <div class="card-title">
                    <h2 class="font-weight-normal flex-center">Problem Info</h2>
                </div>
                <hr/>
                <div class="card-body">
                    <?php
                    $result = get_info("problems");
                    if ($row = pull_data($result)) {
                        $id = $row['p_id'];
                        $name = $row['name'];
                        $title = $row['title'];
                        $email = $row['email'];
                        $description = $row['description'];
                        $solution = $row['solution'];
                        $time = $row['time_added'];
                        $reviewed = $row['reviewed'];
                        ?>
                        <div class="m-4">
                            <p class="font-weight-bold">ID:<span
                                        class="font-weight-normal ml-1"><?php echo $id ?></span></p>
                            <p class="font-weight-bold">Client Name:<span
                                        class="font-weight-normal ml-1"><?php echo $name ?></span></p>
                            <p class="font-weight-bold">Problem Title:<span
                                        class="font-weight-normal ml-1"><?php echo $title ?></span></p>
                            <p class="font-weight-bold">Description:<span
                                        class="font-weight-normal ml-1"><?php echo $description ?></span></p>
                            <p class="font-weight-bold">Suggested Solution:<span
                                        class="font-weight-normal ml-1"><?php echo $solution ?></span></p>
                            <p class="font-weight-bold">Email: <span class="font-weight-normal ml-1"><a
                                            href="mail.php?email=<?php echo base64_encode($email) ?>&title=<?php echo base64_encode($title) ?>"><?php echo $email ?></a></span>
                            </p>
                            <p class="font-weight-bold">Date Submitted:<span
                                        class="font-weight-normal ml-1"><?php echo $time ?></span></p>
                            <p class="font-weight-bold">Reviewed:<span
                                        class="font-weight-normal ml-1"><?php echo $reviewed ?></span></p>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/scripts.php" ?>
</body>
</html>