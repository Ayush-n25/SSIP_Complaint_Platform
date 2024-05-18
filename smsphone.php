<!DOCTYPE html>
<?php
if(isset($_POST['send']))
{
    $from = $_POST['fmail'];
    $phoneno = $_POST['phoneno'];
    $message= $_POST['message'];
    $carrier= $_POST['carrier'];
    if(empty($from))
    {
        echo("Enter email");
        exit();
;    }
        else if(empty($phoneno)){
            echo("enter the phone number");
            exit();
        }
        else if(empty($carrier)){
            echo("enter the specific carrier");
            exit();
        }
        else if(empty($message)){
            echo("enter the message");
            exit();
        }
        else{
            $message=wordwrap($message,70);
            $header = $from;
            $subject = 'from submission';
            $to = $phoneno.'@'.$carrier;
            $result = mail($to, $subject ,$message ,$header);
            echo("Message Sent to".$to);
        }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="smsphone.php" method="post">
        <table align="center">
            <tr>
                <td>From</td>
                <td><input type="email" name="fmail" placeholder="sdfgujsdgfsdg"></td>
                <br>
                <td>Phonenumber</td>
                <td><input type="text" name="phoneno" placeholder="+91"></td>
                <br>
                <td>Carrier</td>
                <td><input type="text" name="carrier" placeholder="sdfgujsdgfsdg"></td>
                <br>
                <td>message</td>
                <td>
                    <textarea name="message"  cols="50" rows="6">      

                </textarea></td>
                <br>
            </tr>
            <tr>
                <td ><input type="submit" value="send" name="send">
                
                </td>
            </tr>
        </table>
    </form>
</body>
</html>