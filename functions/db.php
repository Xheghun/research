<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "research_db";

    $con = mysqli_connect($host,$user,$pass,$db);

    function query_db($sql) {
        global $con;
       return mysqli_query($con,$sql);
    }
function confirm($result) {
    global $con;
    if (!$result) {
        die("Query Failed ".mysqli_error($con));
    }
}
?>