<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="complaint.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="navbar.js">
    <link rel="stylesheet" href="chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="header"></div>
    <div class="main-container"></div>
    <div style="width: 100%;">
        <div class="d-flex h-5" style="height: auto; ">
            <div class="logo">
                <img class="logo-container" src="SSIP_LOGo.png" alt="Flowers in Chania">

            </div>
            <div class="container1">

                <div class="menu">
                    <div class="bar">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="container-fluid">

                                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                                    data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav">
                                        <a class="navbar-brand" href="base.html"></a>
                                        <a class="nav-link" href="complaint.html"></a>
                                        <a class="nav-link" href="timer.html"></a>
                                        <a class="nav-link" href="feedback.html"></a>
                                        <div class="search">
                                            <form class="example" action="action_page.php">
                                                <input type="text" placeholder="Search.." name="search">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                        <img class="profile-container" src="SSIP_LOGo.png" alt="Flowers in Chania">
                                    </div>
                                </div>
                            </div>


                        </nav>
                    </div>
                </div>

            </div>


        </div>

        <div class="d-flex flex-row" style=" background-color: rgba(250, 235, 215, 0);">
            <div class="" style="margin-right: 50px;">

            </div>
            <div class="card" style="width: 18rem;">
                <span style="margin-left: 200px; margin-right: -10px; margin-top: -5px;" class="badge text-bg-primary">Status</span>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a style="margin-bottom: 10px;" href="#" class="btn btn-primary">Approv</a>
                  <a style="margin-bottom: 10px;" href="#" class="btn btn-primary">Denie</a>
                  <a style="margin-bottom: 10px;" href="#" class="btn btn-primary">Update</a>
                </div>
               
              </div>
              <div class="div-custom" style="margin-left:100px">
                <?php

   
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername,$username,$password,"userform");

        if(!$conn)
            echo ("sorry we failed to connect :". mysqli_connect_error());
        else{
            // echo "connection was successfull";
            // $sql ="CREATE DATABASE complaint";
            // $result=mysqli_query($conn,$sql);
            
    
            $query = "SELECT usertable.name, usertable.email, complainttemp.category, complainttemp.services, complainttemp.discription
            FROM   usertable  
            INNER JOIN complainttemp
            ON usertable.userCode=complainttemp.userCode where complainttemp.category='TALATI'";
           echo '<table border="0" cellspacing="2" cellpadding="2"> 
           <tr> 
               <td> <font face="Arial">NAME</font> </td> 
               <td> <font face="Arial">EMAIL</font> </td> 
               <td> <font face="Arial">CATEGORY</font> </td> 
               <td> <font face="Arial">SERVICES</font> </td> 
               <td> <font face="Arial">DISCRIPTION</font> </td> 
           </tr>';
     
     if ($result = $conn->query($query)) {
         while ($row = $result->fetch_assoc()) {
             $field1name = $row["name"];
             $field2name = $row["email"];
             $field3name = $row["category"];
             $field4name = $row["services"];
             $field5name = $row["discription"]; 
     
             echo '<tr> 
                       <td>'.$field1name.'</td> 
                       <td>'.$field2name.'</td> 
                       <td>'.$field3name.'</td> 
                       <td>'.$field4name.'</td> 
                       <td>'.$field5name.'</td> 
                   </tr>';
         }
         $result->free();
     }    
 }
    
?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="response.js"></script>
    <script src="chat.js"></script>
    <script>
        window.onload = function () {
            var subjectSel = document.getElementById("subject");
            var topicSel = document.getElementById("topic");
            var chapterSel = document.getElementById("chapter");
            for (var x in subjectObject) {
                subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function () {
                //empty Chapters- and Topics- dropdowns
                chapterSel.length = 1;
                topicSel.length = 1;
                //display correct values
                for (var y in subjectObject[this.value]) {
                    topicSel.options[topicSel.options.length] = new Option(y, y);
                }
            }
            topicSel.onchange = function () {
                //empty Chapters dropdown
                chapterSel.length = 1;
                //display correct values
                var z = subjectObject[subjectSel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
                }
            }
        }
    </script>
</body>

</html>
