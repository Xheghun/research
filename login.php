<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 04/01/2019
 * Time: 08:31 PM
 */
?>
<html>
    <head>
        <?php include "includes/head.php";
            login();
            //keep_user();
        ?>
    </head>
    <body>
        <?php include "includes/nav.php"?>
        <div class="container">
            <div class="row flex-center">
                <div class="col-md-6">
                <div class="card">
                    <?php display_message(); ?>
                    <div class="card-title">
                        <!-- Default form login -->
                        <form class="text-center border border-light p-5 needs-validation" novalidate method="post">
                            <p class="h4 mb-4">Sign in</p>
                            <!-- Email -->
                            <div class="md-form">
                                <input type="email" name="email" required id="email" class="form-control mb-4">
                                <label for="email">Email</label>
                            </div>
                            <div class="md-form">
                                <!-- Password -->
                                <input required type="password" name="password" id="password" class="form-control mb-4">
                                <label for="password">Password</label>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div>
                                    <!-- Remember me -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember_me" id="remember">
                                        <label class="custom-control-label" for="remember">Remember me</label>
                                    </div>
                                </div>
                                <div>
                                    <!-- Forgot password -->
                                    <a href="#">Forgot password?</a>
                                </div>
                            </div>

                            <!-- Sign in button -->
                            <button class="btn bg btn-block my-4" name="submit" type="submit">Sign in</button>
                        </form>
                        <!-- Default form login -->
                    </div>
                </div>
            </div>
            </div>
        </div>
    <?php include "includes/footer.php"?>
    <?php include "includes/scripts.php" ?>
    </body>
</html>
