<?php
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "bus";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}
// echo "<p style='color:red;font-size:300px;text-align:center;'>🤷‍♂️</p>";
?>