<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form_db";

    $conn = mysqli_connect($servername,$username,$password,$dbname); /// processurel style

    if(!$conn){
        die("connection failed");
    }
    else{
       // echo "connection sucessful";
    }

?>