<?php
/**
 * Created by PhpStorm.
 * User: xheghun
 * Date: 30/12/2018
 * Time: 01:20 PM
 */

function redirect($url) {
    header("Location: {$url}");
    exit;
}
function set_message($message) {
    $_SESSION["v_message"] = $message;
}
function display_message() {
    if (!empty($_SESSION["v_message"])) {
        echo <<<HTML
            <div class="alert alert-primary black-text alert-dismissible fade show p-3" role="alert">
            <strong>{$_SESSION["v_message"]}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"> &times;</span>
</button>
    </div>
HTML;
        $_SESSION["v_message"] = "";
    }
}

function info($info) {
    $msg = <<<IO
    <div class="alert alert-primary black-text alert-dismissible fade show p-3" role="alert">
        <strong>{$info}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <span aria-hidden="true">&times;</span>
    </div>
IO;
    return $msg;
}
function p_form() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $problemTitle = filter_input(INPUT_POST, "prob_title", FILTER_SANITIZE_SPECIAL_CHARS);
            $problem = filter_input(INPUT_POST, "problem", FILTER_SANITIZE_SPECIAL_CHARS);
            $solution = filter_input(INPUT_POST, "solution", FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($name)) {
                set_message("name field must be filled");
                redirect("index.php");
            } elseif (empty($problem)) {
                set_message("field required");
                redirect("index.php");
            } else {
                $time = strftime("%B-%M-%Y %H:%M:%S", time());
                $sql = "INSERT INTO problems (client_name,email,problem_title,problem_desc,solution,time_added) 
                  VALUES ('$name','$email','$problemTitle','$problem','$solution','$time')";
                $result = query_db($sql);
                confirm($result);
                    set_message("Thanks For filling this form we really appreciate it :)");
                    redirect("index.php");
            }
        }
}