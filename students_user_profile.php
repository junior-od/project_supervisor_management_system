<?php 
	include("db_connect.php");
	session_start();
    $user_name=$_SESSION['supervisor_user_name'];
    $error_message="";
    $error_message_e ="";
    $sucess_message_e="";
    $sucess_message="";
	if(isset($_POST['update_picture'])){
		if(!empty($_FILES['avatar']['name']) && preg_match("!image!", $_FILES['avatar']['type'])){
			$avatar_path=('profile_picture/'.$_FILES['avatar']['name']);
			if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){
				$update_query=$connect->prepare("UPDATE supervisor_management_system.students SET profile_picture='".$avatar_path."' WHERE matricNo='".$_SESSION['matricNo']."'");
				$update_query->execute();
				$_SESSION['profile_picture']=$avatar_path;
				 $sucess_message="<div class='alert alert-success' role='alert'>
              YOUR PROFILE PICTURE UPDATED SUCESSFULLY!
                  </div>";

			}
		// 	
		}
		else{
			 $error_message="<div class='alert alert-danger' role='alert'>
              FAILED TO UPLOAD PICTURE OR SELECT A PICTURE FORMAT
                  </div>";



		}
    }
    $user_name=$_SESSION['supervisor_user_name'];
	$supervisor_name=$_SESSION['supervisor_full_name'];


	if(isset($_POST['update_profile'])){
		$query_full_name=$connect->query("SELECT * FROM supervisor_management_system.students WHERE fullName='".$_POST['full_name']."'");
        $query_supervisor_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE supervisor_name='".$_POST['full_name']."'");
		$supervisor_name_count=count($query_supervisor_name->fetchAll());
        $full_name_count=count($query_full_name->fetchAll());
		$query_email_address=$connect->query("SELECT * FROM supervisor_management_system.students WHERE email='".$_POST['email_address']."'");
		$email_address_count=count($query_email_address->fetchAll());

		if(!empty($_POST['full_name']) && !empty($_POST['email_address'])){
			if(preg_match("/^[a-zA-Z ]*$/", $_POST['full_name']) && preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
				if(($full_name_count <= 0 || $supervisor_name_count <= 0) && $email_address_count <= 0){
					$update_profile_query=$connect->prepare("UPDATE supervisor_management_system.students SET fullName=:name, email=:email WHERE matricNo='".$_SESSION['matricNo']."' ");
					$name=$_POST['full_name'];
					$email=$_POST['email_address'];
                    $update_profile_query->execute(array(':name' => $name,':email' => $email));
                    $update_name=$connect->prepare("UPDATE supervisor_management_system.appointment_$user_name SET student_name=:student_name WHERE student_name='".$_SESSION['fullName']."' ");
					$update_name->execute(array(':student_name' => $name));

					$update_name_sender= $connect->prepare("UPDATE message_$user_name SET sender='".$name."' WHERE sender='".$_SESSION['fullName']."' AND receiver='".$supervisor_name."' ");
					$update_name_sender->execute();

					$update_name_receiver= $connect->prepare("UPDATE message_$user_name SET receiver='".$name."' WHERE receiver='".$_SESSION['fullName']."' AND sender='".$supervisor_name."' ");
					$update_name_receiver->execute();
					$_SESSION['fullName']=$name;
					$_SESSION['email']=$email;
					 $sucess_message_e="<div class='alert alert-success' role='alert'>
              YOUR PROFILE  UPDATED SUCESSFULLY!
                  </div>";


				}
				else{
					$error_message_e="<div class='alert alert-danger' role='alert'>
              full name or email already exists
                  </div>";

				}
			}
			else{
				$error_message_e="<div class='alert alert-danger' role='alert'>
              invalid input
                  </div>";
			}

		}
		else{
			$error_message_e="<div class='alert alert-danger' role='alert'>
              enter email or full name
                  </div>";

		}


	}
?>
<?php 
	$unread="";
    $user_name=$_SESSION['supervisor_user_name'];
	$full_name=  $_SESSION['fullName'];
	$query_message_table=$connect->query("SELECT * FROM message_$user_name WHERE receiver='".$full_name."' AND opened ='0' ");
	$query_message_table_count=count($query_message_table->fetchAll());

	if($query_message_table_count > 0){
		$unread= $query_message_table_count;
	}
	else{
		$unread="";
	}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Supervisor Appointment Management System</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <style>
        .blur {-webkit-filter: blur(4px);filter: blur(4px);}
        </style>
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['fullName']; ?></h3>
            </div>

            <ul class="nav">
                <li class="">
                    <a href="students_home_page.php">
                        <i class="ti-list"></i>
                        <p>Book Appointment</p>
                    </a>
                </li>
                <li class="active">
                    <a href="students_user_profile.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="students_messages.php">
                        <i class="ti-email"></i>
                        <p>Messages <span class="badge bg-green" style="background-color:orangered;color:white;"><?php echo $unread; ?></span></p>
                    </a>
                </li>
                <li>
                    <a href="students_my_appointment.php">
                        <i class="ti-list"></i>
                        <p>My Appontments</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><p>Assigned Supervisor:<?php echo " ". $_SESSION['supervisor_full_name']; ?></p></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
						<li>
                            <a href="students_log_out.php">
								<i class="ti-shift-left"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  enctype="multipart/form-data">
                            <div class="image">
                                <img class="blur" src="<?=  $_SESSION['profile_picture']?>" alt="..."/>
                            </div>
                            
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?=  $_SESSION['profile_picture']?>" alt="..."/>
                                  <h5 class="title"> <input type="file" name="avatar"  accept="images/*"></h5>
                                  <h6><input type="submit" value="update picture "  class="update_profile_button" name="update_picture"></h6>
                                </div>
                                <p class="description text-center">
                                    Matric No: <?php echo  $_SESSION['matricNo'];?><br>
                                    Fullname: <?php echo $_SESSION['fullName']; ?> <br>
                                    Email Address: <?php echo $_SESSION['email']; ?> <br>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-12 ">
                                    <?php echo $sucess_message;
					                echo $error_message;
				                         ?>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" >
                                                <label>Matric No:</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="" value="<?php echo " ". $_SESSION['matricNo']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fullname</label>
                                                <input type="text"id="full_name" name="full_name" onchange="lowerCase()" class="form-control border-input"  value="<?php echo $_SESSION['fullName']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" id="email" name="email_address" onchange="lowerCase()" class="form-control border-input" value="<?php echo $_SESSION['email']; ?>">
                                            </div>
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="text-center">
                                        <button name="update_profile"type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php echo $sucess_message_e;
					                echo $error_message_e;
				                         ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>


</body>
<script>
	function lowerCase(){
		var c = document.getElementById("full_name");
		c.value=c.value.toLowerCase();

		var d = document.getElementById("email");
		d.value=d.value.toLowerCase();
	}
</script>
       <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

</html>
