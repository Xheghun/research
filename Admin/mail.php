<!DOCTYPE html>
<html>
<head>
    <?php
    include "includes/head.php";
    if (!is_logged_in()) {
        redirect("../login.php");
    }
    contact();
    $title = filter_input(INPUT_GET, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_GET, "email", FILTER_SANITIZE_EMAIL);
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
                    <li class="side-nav nav-item"><a href="../Admin" class="nav-link">Dashboard</a></li>
                    <li class="active side-nav nav-item">
                        <a class="nav-link" href="problems.php">Problems
                            <span style="border-radius: 100%;" class="p-1 red"><?php echo row_nums(); ?></span></a>
                    </li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Ideas</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="#">Contacts</a></li>
                    <li class="side-nav nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-door-open"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card p-3">
                <div class="card-title">
                    <h2 class="font-weight-normal flex-center">IO Mail</h2>
                </div>
                <hr/>
                <div class="card-body">
                    <!-- Default form login -->
                    <form method="post" class="border border-light mr-lg-5 ml-lg-5 p-5">
                        <!-- To -->
                        <label class="" for="to">To:</label>
                        <input name="to" type="text" id="to" class="form-control mb-4" value="<?php echo $email; ?>"
                               placeholder="To:">


                        <!-- Subject -->
                        <label for="subject">Subject:</label>
                        <input type="text" name="subject" id="subject" class="form-control mb-4"
                               value="RE:<?php echo $title; ?>" placeholder="Subject:">

                        <!-- Cc:-->
                        <label for="Cc">Cc:</label>
                        <input type="text" id="Cc" name="cc" placeholder="Cc recipient" class="form-control mb-4">

                        <label for="Bcc">Bcc:</label>
                        <input type="text" id="Bcc" name="bcc" class="form-control mb-4" placeholder="Bcc">


                        <label for="attach">File:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="attach">Attach File</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" aria-describedby="file">
                                <label class="custom-file-label" for="file">Choose file</label>
                            </div>
                        </div>

                        <label class="mt-4" for="body">Body:</label>
                        <textarea id="body" name="body" placeholder="mail content" class="form-control mb-4"></textarea>

                        <div class="d-flex justify-content-around">
                        </div>
                        <!-- Sign in button -->
                        <button class="btn btn-info my-4" value="submit" name="submit" type="submit"><i
                                    class="fa fa-send"></i></button>
                    </form>
                    <!-- Default form login -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "includes/scripts.php" ?>
</body>
</html>