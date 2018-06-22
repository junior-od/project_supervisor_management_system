<?php 
	include("db_connect.php");
	session_start();
?>

<?php 
    $user_name= $_SESSION['userName'];
    $supervisor_name=$_SESSION['supervisor_name'];
    $id=$_GET['id'];
    $_SESSION['appoint']=$id;
    $matric=$_GET['matric'];
    $_SESSION['appoint_matric']=$matric;
    
    $query_info=$connect->query("SELECT id,student_name,appointment_date,time FROM appointment_$user_name WHERE id='".$id."'");
    $query_info_fetch=$query_info->fetchAll();
    foreach ($query_info_fetch as $info) {
    	$appoint_id=$info['id'];
    	$name=$info['student_name'];
    	$date=$info['appointment_date'];
    	$time=$info['time'];	
    }
   
    
   
  
?>

<?php
    $user_name= $_SESSION['userName'];
    $full_name=$_SESSION['supervisor_name'];
	$unread="";
	$query_message_table=$connect->query("SELECT * FROM message_$user_name WHERE receiver='".$full_name."' AND opened ='0' ");
	$query_message_table_count=count($query_message_table->fetchAll());

	if ($query_message_table_count >0){
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
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>	
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['userName']; ?></h3>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="supervisor_home_page.php">
                        <i class="ti-list"></i>
                        <p>Appointment List</p>
                    </a>
                </li>
                <li>
                    <a href="supervisor_dashboard.php">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="supervisor_messages.php">
                        <i class="ti-email"></i>
                        <p>Messages <span class="badge bg-green" style="background-color:orangered;color:white;"><?php echo $unread; ?></span></p>
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
                            <a href="supervisor_logout.php">
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
                    <div class="col-md-12">
                        <div class="card">
                        <div class="header">
                                <h4 class="title">Cancel Appointment Confirmation </h4>
                            </div>
                            <div class="content  table-responsive table-full-width">
                            <table class="table table-hover">
							<tbody>	
							
				<form method="get" action=<?php echo "delete_appointment.php"; ?> style="text-align:center;">
					<tr><td>STUDENT NAME : <?php echo $name;?></td></tr>
					<tr><td>MATRIC NO : <?php echo $matric;?></tr><t/d>

					<tr><td>APPOINTMENT DATE : <?php echo $date;?></td></tr>
					<tr><td>APPOINTMENT TIME : <?php echo $time;?></tr><td>
					<label>MESSAGE</label>
					<textarea class="form-control" type="text" rows="3" style="width:100%;" name="message"></textarea>
					<br>
				
					<input type="submit" class="btn btn-danger" value="CANCEL APPOINTMENT">


				</form>
				</tbody>
					</table> 
                        </div>
                    </div>
                </div>
    </div>


</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

</html>