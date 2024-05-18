<?php
$servername = "localhost";
$username = "root";
$password = "";

$discription = $_GET['discription'];
$conn = mysqli_connect($servername,$username,$password,"userform");
$sql = "INSERT INTO complainttemp(category,services,discription,filename) values('ok','ok','$discription','ok')";
if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
} else {
    echo "not inserted".mysqli_error($conn);
}
?>