<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 02/01/2019
 * Time: 09:14 PM
 */

require_once ("init.php");

$name = filter_input(INPUT_POST,"name");
$email = filter_input(INPUT_POST,"email");
$idea = filter_input(INPUT_POST,"idea");
$time = strftime("%B-%M-%Y %H:%M:%S",time());
$sql = "INSERT INTO ideas(i_name,email,idea,added_on) VALUES ('$name','$email','$idea','$time')";
$result = query_db($sql);
if ($result) {
    $rs = info("Thanks for sharing your idea with us<br> we'll get back to you :)");
}else {
    $rs = info("Opps, Something went wrong, try again later");
}

$rs = $_POST['rs'] = $rs;
echo $rs;