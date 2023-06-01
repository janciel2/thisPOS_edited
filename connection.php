
<?php 


    $host = "localhost";
    $username = "root";
    $password = "";
    $database = `webdev1_database`;

    $conn = mysqli_connect($host,$username,$password,$database) or die("Connection Failed: " .mysqli_connect_error());


    // if($conn->connect_error) 
    // {
    //     die("Connection Failed" . $conn->connect_error);
    // }

?> 