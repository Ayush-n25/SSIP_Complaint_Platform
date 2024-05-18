<?php

use LDAP\Result;

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

echo "connection was successful";


if(!$conn)
    echo ("sorry we failed to connect :". mysqli_connect_error());
else
    echo "connection was successfull";
    $conn = mysqli_connect($servername,$username,$password,"userform");
    $sql = "INSERT INTO complainttemp(category,services,discription,filename) values('ok','ok','ok','ok')";
    if ($conn->query($sql)){
        echo "New record is inserted sucessfully";
    } else {
        echo "not inserted".mysqli_error($conn);
    }
//db

// $sql ="CREATE DATABASE complaint";
// $result=mysqli_query($conn,$sql);
// echo "the result is" ;
// echo var_dump($result);
// echo "<br>";

// if(!$result)
// {
//     echo "the db was created successfully";
// }
// else
// {
//     echo "the db was not created because of this error -->".mysqli_error($conn);
// }



?>