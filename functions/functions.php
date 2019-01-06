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
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
</button>
        
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

function login() {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
        $remember_me = filter_input(INPUT_POST,"remember_me",FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($email)) {
            set_message("name field is required");
            //redirect("login.php");
        }elseif (empty($password)) {
            set_message("password field is required");
           // redirect("login.php");
        }else {
            $sql = "SELECT password FROM admins WHERE email = '$email' AND valid = 1";
            $result = query_db($sql);
            if (row_count($result) == 1) {
                $row = fetch_array($result);
                $pass = $row['password'];
                if (password_verify($password, $pass)) {
                    if ($remember_me == "on") {
                        setcookie("projectx_email", $email, time() + 86400 * 30);
                    }
                    $_SESSION['projectx_email'] = $email;
                    redirect("admin/");
                } else {
                    set_message("username or password is incorrect");
                }
            }
        }
    }
}

function keep_user() {
    if (isset($_SESSION['projectx_email']) || isset($_COOKIE['projectx_email'])) {
        redirect("admin/");
    }
}