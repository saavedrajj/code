<?php
$link = mysqli_connect("127.0.0.1", "my_user", "my_password", "my_db");

if (!$link) {
    echo "Error: Unable to connect to MySQL<br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . "<br>";
echo "Host information: " . mysqli_get_host_info($link) . "<br>";

mysqli_close($link);
?>