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
                    <li class="side-nav nav-item"><a href="../Admin" class="nav-link">Dashboard</a></li>
                    <li class="side-nav nav-item">
                        <a class="nav-link" href="problems.php">Problems
                            <span style="border-radius: 100%;"
                                  class="p-1 red"><?php echo row_nums("problems"); ?></span></a>
                    </li>
                    <li class="active-link active side-nav nav-item"><a class="nav-link" href="ideas.php">Ideas
                            <span style="border-radius: 100%;"
                                  class="p-1 red"><?php echo row_nums("ideas"); ?></span></a>
                        </a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Contacts</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-door-open"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card p-3">
                <div class="card-title">
                    <h2 class="font-weight-bold">Ideas</h2>
                </div>
                <hr/>
                <table class="card-body table table-striped table-bordered table-responsive-sm">
                    <thead>
                    <tr class="t-row">
                        <th class="font-weight-bold text-capitalize" scope="col">id</th>
                        <th class="font-weight-bold text-capitalize" scope="col">Title</th>
                        <th class="font-weight-bold text-capitalize" scope="col">description</th>
                        <th class="font-weight-bold text-capitalize" scope="col">Client</th>
                        <th class="font-weight-bold text-capitalize" scope="col">Options</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $row = 0;
                    if (get_problems('no')) {
                        $result = get_problems('no');
                        while ($rows = pull_data($result)) {
                            $id = $rows['p_id'];
                            $title = $rows['title'];
                            $desc = $rows['description'];
                            $client = $rows['name'];
                            $email = $rows['email'];
                            $row++;
                            ?>

                            <tr>
                                <th scope="row"><?php echo $row ?></th>
                                <td><?php echo $title ?></td>
                                <td><?php echo $desc ?></td>
                                <td><?php echo $client ?></td>
                                <td>
                                    <div class="btn-group">
                                        <!--Dropdown primary-->
                                        <div class="dropdown">
                                            <!--Trigger-->
                                            <a id="dropdownMenu2" class="waves-effect p-2 option-radius"
                                               data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-h fa-lg"></i></a>
                                            <!--Menu-->
                                            <div class="dropdown-menu dropdown-primary">
                                                <a class="dropdown-item"
                                                   href="mail.php?email=<?php echo base64_encode($email) ?>&id=<?php echo base64_encode($id) ?>&title=<?php echo base64_encode($title); ?>">Contact</a>
                                                <a class="dropdown-item"
                                                   href="details.php?email=<?php echo base64_encode($email) ?>&id=<?php echo base64_encode($id) ?>&title=<?php echo base64_encode($title) ?>">Details</a>
                                                <a class="dropdown-item"
                                                   href="delete.php?id=<?php echo base64_encode($id) ?>&title=<?php echo base64_encode($title) ?>">Delete</a>
                                            </div>
                                        </div>
                                        <!--/Dropdown primary-->
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
            <hr class="mr-2"/>
            <div class="card p-3">
                <div class="card-title">
                    <h2 class="font-weight-bold">Reviewed Ideas</h2>
                </div>
                <hr/>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive-sm">
                        <thead>
                        <tr class="t-row">
                            <th class="font-weight-bold text-capitalize" scope="col">id</th>
                            <th class="font-weight-bold text-capitalize" scope="col">Title</th>
                            <th class="font-weight-bold text-capitalize" scope="col">description</th>
                            <th class="font-weight-bold text-capitalize" scope="col">Client</th>
                            <th class="font-weight-bold text-capitalize" scope="col">Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $row = 0;
                        if (get_problems('yes')) {
                            $result = get_problems('yes');
                            while ($rows = pull_data($result)) {
                                $id = $rows['p_id'];
                                $title = $rows['title'];
                                $desc = $rows['description'];
                                $client = $rows['name'];
                                $email = $row['email'];
                                $row++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row ?></th>
                                    <td><?php echo $title ?></td>
                                    <td><?php echo $desc ?></td>
                                    <td><?php echo $client ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <!--Dropdown primary-->
                                            <div class="dropdown">
                                                <!--Trigger-->
                                                <a class="p-2 waves-effect option-radius" id="dropdownMenu1"
                                                   data-toggle="dropdown"
                                                   aria-haspopup="true" aria-expanded="false"><i
                                                            class="fa fa-ellipsis-h fa-lg"></i></a>
                                                <!--Menu-->
                                                <div class="dropdown-menu dropdown-primary">
                                                    <a class="dropdown-item"
                                                       href="mail.php?id=<?php echo $id ?>&title=<?php echo $title ?>&email=<?php echo $email ?>">Contact</a>
                                                    <a class="dropdown-item"
                                                       href="details.php?id=<?php echo $id ?>&title=<?php echo $title ?>">Details</a>
                                                    <a class="dropdown-item" href="">Mark as un-reviewed</a>
                                                    <a class="dropdown-item"
                                                       href="delete.php?id=<?php echo $id ?>&title=<?php echo $title ?>">Delete</a>
                                                </div>
                                            </div>
                                            <!--/Dropdown primary-->
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<?php include "includes/scripts.php" ?>
</body>
</html>