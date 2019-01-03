<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 02/01/2019
 * Time: 09:14 PM
 */

$name = filter_input(INPUT_POST,"id_name", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,"id_email",FILTER_SANITIZE_EMAIL);
$idea = filter_input(INPUT_POST,"id_idea",FILTER_SANITIZE_SPECIAL_CHARS);
$time = strftime("%B-%M-%Y %H:%M:%S",time());
$sql = "INSERT INTO ideas(contributor_name,contributor_email,idea,added_on)
  VALUES ('$name','$email','$idea','$time')";
$result = query_db($sql);
if ($result) {
    $rs = info("Thanks for sharing your idea with us<br> we'll get back to you :)");
}else {
    confirm($result);
    $rs = info("Opps, Something went wrong, try again later");
}

$rs = $_POST['rs'] = $rs;
echo $rs;