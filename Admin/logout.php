<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 09/01/2019
 * Time: 05:22 PM
 */
require "functions/init.php";
session_destroy();
setcookie('projectx_email', "", time() + 86400 * 30);
redirect("../login.php");