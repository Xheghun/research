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

/**
 * @param $message
 */
function set_message($message) {
    $_SESSION["v_message"] = $message;
}

/**
 *
 */
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

/**
 * @param $info
 * @return string
 */
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

/**
 *
 */
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
                $reviewed = "no";
                $time = strftime("%B-%M-%Y %H:%M:%S", time());
                $sql = "INSERT INTO problems (name,email,title,escription,solution,time_added,reviewed)
                  VALUES ('$name','$email','$problemTitle','$problem','$solution','$time','$reviewed')";
                $result = query_db($sql);
                confirm($result);
                    set_message("Thanks For filling this form we really appreciate it :)");
                    redirect("index.php");
            }
        }
}

/**
 *
 */
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

/**
 *
 */
function keep_user() {
    if (isset($_SESSION['projectx_email']) || isset($_COOKIE['projectx_email'])) {
        redirect("admin/");
    }
}

/**
 * @return int
 */
function count_problems()
{
    $sql = "SELECT * FROM problems";
    $result = query_db($sql);
    return row_count($result);
}

/**
 * @return int
 */
function count_ideas()
{
    $sql = "SELECT * FROM ideas";
    $result = query_db($sql);
    return row_count($result);
}

/**
 * @return int
 */
function count_contacts()
{
    $sql = "SELECT * FROM contacts";
    $result = query_db($sql);
    return row_count($result);
}

/**
 * @param $type : switch between reviewed and un-reviewed problems
 * @return bool|mysqli_result
 */
function get_problems($type)
{
    $sql = "";
    if ($type == 'no') {
        $sql = "SELECT * FROM problems WHERE reviewed = 'no' ORDER BY p_id desc";
    }
    if ($type == 'yes') {
        $sql = "SELECT * FROM problems WHERE  reviewed = 'yes' ORDER BY p_id desc";
    }
    $result = query_db($sql);
    confirm($result);
    return $result;
}

function row_nums($table_name)
{
    $sql = "SELECT * FROM $table_name WHERE reviewed = 'no'";
    $result = query_db($sql);
    $nums = row_count($result);

    return $nums;
}

function is_logged_in()
{
    if (isset($_SESSION["projectx_email"]) || isset($_COOKIE["projectx_email"])) {
        return true;
    } else {
        return false;
    }
}


function get_info($table_name)
{
    $id = base64_decode(filter_input(INPUT_GET, "id", FILTER_SANITIZE_SPECIAL_CHARS));
    $title = base64_decode(filter_input(INPUT_GET, "title", FILTER_SANITIZE_SPECIAL_CHARS));

    $sql = "SELECT * FROM $table_name WHERE p_id = '$id' and  title = '$title'";
    $result = query_db($sql);

    return $result;
}