<?php

use LDAP\Result;

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,$username,$password);

if(!$conn)
    echo ("sorry we failed to connect :". mysqli_connect_error());
else
    $conn = mysqli_connect($servername,$username,$password,"userform");
    if($_POST['status'] == 'Approve') {
        $sql = "UPDATE `complainttemp` SET `status` = 'Approve' WHERE `userCode` = '".$_POST['id']."'";
        if ($conn->query($sql)){
            echo "updated";
        } else {
            echo "not updated".mysqli_error($conn);
        }
    } elseif ($_POST['status'] == 'Decline') {
        $sql = "UPDATE `complainttemp` SET `status` = 'Decline' WHERE `userCode` = '".$_POST['id']."'";
        if ($conn->query($sql)){
            echo "updated";
        } else {
            echo "not updated".mysqli_error($conn);
        }
    } elseif ($_POST['status'] == 'Update') {
        $sql = "UPDATE `complainttemp` SET `status` = 'Waiting' WHERE `userCode` = '".$_POST['id']."'";
        if ($conn->query($sql)){
            echo "updated";
        } else {
            echo "not updated".mysqli_error($conn);
        }
    }
?>