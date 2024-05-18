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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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

                                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
            <div class="div-custom" style="display:flex;justify-content: center;align-items: center;" >
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $conn = mysqli_connect($servername, $username, $password, "userform");

                if (!$conn)
                    echo ("sorry we failed to connect :" . mysqli_connect_error());
                else {
                    // echo "connection was successfull";
                    // $sql ="CREATE DATABASE complaint";
                    // $result=mysqli_query($conn,$sql);


                    $query = "SELECT usertable.userCode, usertable.name, usertable.email, complainttemp.category, complainttemp.services, complainttemp.discription, complainttemp.status
            FROM   usertable  
            INNER JOIN complainttemp
            ON usertable.userCode=complainttemp.userCode where complainttemp.category='DDO'";

                    if ($result = $conn->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            $user_id = $row['userCode'];
                            $status = $row['status'];
                            $field1name = $row["name"];
                            $field2name = $row["email"];
                            $field3name = $row["category"];
                            $field4name = $row["services"];
                            $field5name = $row["discription"];

                            echo '
                            <div style = "margin: 50px">
                            <div class="card" style="width: 18rem;">
                            <span style="margin-left: 200px; margin-right: -10px; margin-top: -5px;" class="badge text-bg-primary">Status</span>
                            <div class="card-body">
                              <h3 class="card-title">'.$field4name.'</h3>
                              <h5 class="card-title">by '.$field1name.'</h5>
                              <h5 class="card-title">email-'.$field2name.'</h5>
                              <p id="comp-body">'.$field5name.'</p>
                              <a style="margin-bottom: 10px;" href="#" class="btn btn-primary changeStatus" data-status="Approve" data-id="'.$user_id.'">Approve</a>
                              <a style="margin-bottom: 10px;" href="#" class="btn btn-warning changeStatus" data-status="Update" data-id="'.$user_id.'">Update</a>  
                              <a style="margin-bottom: 10px;" href="#" class="btn btn-danger changeStatus" data-status="Decline" data-id="'.$user_id.'">Decline</a>
                            </div>
                           
                          </div>
                          </div>';
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
    <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
    <script>
       //User status approv
        $(".changeStatus").on("click" ,function() {
            swal({
		title: "Are you sure?",
		text: "You will not be able to recover this imaginary file!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
    if (isConfirm){
      swal("Deleted!", "Your imaginary file has been deleted!", "success");
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
	});

            var user_id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            $.ajax({
                url: "./tracking_status.php",
                type: "POST",
                data: {id : user_id, status : status},
                success: function(resultData){
                    alert("Status Updated");
                }
            });    
        });

        window.onload = function() {
            var subjectSel = document.getElementById("subject");
            var topicSel = document.getElementById("topic");
            var chapterSel = document.getElementById("chapter");
            var subjectObject = '';
            for (var x in subjectObject) {
                subjectSel.options[subjectSel.options.length] = new Option(x, x);
            }
            subjectSel.onchange = function() {
                //empty Chapters- and Topics- dropdowns
                chapterSel.length = 1;
                topicSel.length = 1;
                //display correct values
                for (var y in subjectObject[this.value]) {
                    topicSel.options[topicSel.options.length] = new Option(y, y);
                }
            }
            topicSel.onchange = function() {
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