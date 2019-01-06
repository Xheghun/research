<?php ob_start();?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once "includes/head.php"?>

        <title>ProjectX</title>
    </head>
    <body>
<!--Main navigation -->
<header>
    <?php
        include_once "includes/idea_modal.php";
        include_once "includes/nav.php"
    ?>
    <!-- Mask -->
    <div id="intro" class="view hm-red-light">
        <div class="container-fluid full-bg-img d-flex align-items-center justify-content-center">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 text-center">
                    <h4 class="display-3 font-bold white-text mb-2">
                        ProjectX
                    </h4>
                    <hr class="hr-light" />

                    <h4 class="white-text my-2">

                    </h4>
                </div>
            </div>

        </div>
    </div>
    <!-- /Mask -->
</header>


<!--End of Main navigation -->

<!--site content-->
<main class="mt-5">
    <div class="container">
        <!-- Section: Best Features-->
        <section id="best-features" class="text-center">
            <!--Heading -->
            <h2 class="mb-4">About</h2>
            <!-- /Heading -->
            <!--Grid row -->
            <div class="row d-flex justify-content-center mb-4">
                <!--Grid Column -->
                <div class="col-md-8">
                    <!--Description-->
                    <p>
                        A brief info about this project
                    </p>
                    <!-- /Description -->
                </div>
                <!-- /Grid Column -->
            </div>
            <!-- /Grid row -->


            <!-- Grid row -->
            <div class="row">
                <!--Grid column -->
                <div class="col-md-6 mb-4">
                    <i class="fa fa-3x fa-globe darken-3" style="color: #B71C1C"></i>
                    <h4 class="my-4 font-weight-normal">Motive</h4>
                    <p>
                        Technology plays a vital role in today's generation, with infinite amount of problems still yet
                        to be solved though technology ProjectX is a research project that is focused on identifying these problems
                        and solving as many as possible.
                    </p>
                </div>
                <!--Grid column -->

                <!--Grid column -->
                <div class="col-md-6 mb-4">
                    <i class="fa fa-3x fa-bicycle" style="color: #B71C1C"></i>
                    <h4 class="my-4 font-weight-normal">Journey</h4>
                    <p>
                        This project is the first of it's kind and we hope to reach as many people who are having problem(s)
                        especially in African countries.
                    </p>
                </div>
                <!--Grid column -->
            </div>
            <!-- /Grid row -->
        </section>
        <!-- /Section: Best Features-->
        <hr class="my-5"/>
        <section class="text-center mb-4">
            <h2 class="mb-4">Please Fill The Form Below</h2>
            <div class="row flex-center">
                <div class="col-md-6" id="form">
                    <?php
                        display_message();
                        $submit  =  filter_input(INPUT_POST, "submit");
                        if (isset($submit)) {
                            p_form();
                        }
                    ?>
                    <div class="card">
                        <div class="card-title mt-4">All Important Fields are marked with <i class="required">*</i></div>
                        <div class="card-body">
                            <form action="index.php" method="post">
                                    <div class="md-form">
                                        <input type="text" required name="name" id="name" class="form-control" />
                                        <label class="pb-4" for="name">Your Name<i class="required">*</i></label>
                                    </div>
                                    <div class="md-form">
                                        <input type="email" id="email" name="email" class="form-control" />
                                        <label for="email">Your Email Address(your email address would not be published)</label>
                                    </div>
                                    <div class="md-form">
                                        <input type="text" required id="prob_title" name="prob_title" class="form-control"/>
                                        <label for="name">Problem Title<i class="required">*</i></label>
                                    </div>
                                    <div class="md-form">
                                        <textarea id="problem" required name="problem" class="md-textarea form-control"></textarea>
                                        <label for="problem">Description (problems you face everyday)<i class="required">*</i></label>
                                    </div>
                                    <div class="md-form">
                                        <textarea type="text" id="solution" name="solution" class="md-textarea form-control"></textarea>
                                        <label for="solution">How do you think this problems can be solved with tech</label>
                                    </div>
                                <button class="btn btn-block bg" type="submit" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</main>
<!--end of site content -->

<!--site footer-->
<?php include_once "includes/footer.php"?>
<!--end of site footer -->
<!-- SCRIPTS -->
<?php require_once "includes/scripts.php"?>
<script type="text/javascript" src="functions/Ajax/idea.js"></script>
</body>
</html>
