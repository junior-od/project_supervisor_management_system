<?php 
	include("db_connect.php");
	session_start();
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
                <li>
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
                <li class="active">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content  table-responsive table-full-width">
							<table class="table table-hover">
					<thead>
					    <tr>
					      <th scope="col">DATE</th>
					      <th scope="col">TIME </th>
					    
					    </tr>
				    </thead>
				    <tbody>
				<?php 
					 $full_name=$_SESSION['fullName'];
				     $user_name=$_SESSION['supervisor_user_name'];
					 $get_appointment=$connect->query("SELECT id,appointment_date,time FROM appointment_$user_name WHERE student_name='".$full_name."' ORDER BY appointment_date ASC");
					 $get_appointment_fetch=$get_appointment->fetchAll();
					 date_default_timezone_set("Africa/Lagos");
					  $today_time=strtotime("today +18hours");//get todays time
					  $today_date=date("d-m-Y H:i:sa",$today_time);

					  
					


					 
					
					 

					 foreach($get_appointment_fetch as $get){
					 	$temp_date=$get['appointment_date'];
						$temp_time=$get['time'];
						$ap_time=strtotime("$temp_date $temp_time");
						$ap_date=date("d-m-Y H:i:sa",$ap_time);
						

					 	 if ($ap_time < $today_time){
					 		$delete=$connect->exec("DELETE  FROM appointment_$user_name WHERE id='".$get['id']."' AND appointment_date='".$get['appointment_date']."' ");
					 	 }
					 	else{
					 		echo "<tr>";
						 	echo "<td>".$get['appointment_date'] ."</td>";
						 	echo "<td>".$get['time'] ."</td>";
						 	$get_id = $connect->query("SELECT id,appointment_date,time FROM appointment_$user_name WHERE student_name='".$full_name."' ORDER BY appointment_date ASC");
						 	$temp_date=$get['appointment_date'];
						 	$temp_id=$get['id'];
						 	$temp_time=$get['time'];
						 	$now_time=strtotime("now");
						 	$now_time_date=date("d-m-Y H:i:sa",$now_time);
						 	
						 	
						 	$end_appointment_cancel=strtotime("$temp_date $temp_time - 10 hours");
						    $end_appointment_cancel_time=date("d-m-Y H:i:sa",$end_appointment_cancel);

                            $distance=$end_appointment_cancel -$now_time;

						    $day=floor(($distance)/60/60/24);
						    $hour=floor(($distance)/(3600/24));
						    $minutes=floor(($distance)/60);
						    $second=floor(($distance));
                            

						 
						    

						    
						    if ($now_time > $end_appointment_cancel){
						    	echo  "<td><button type='submit' class='btn btn-danger disabled' >CANCEL APPOINTMENT</button></td>";	
						    }
						    else{
								
						    	echo  "<td><a   class='btn btn-danger delete_link' href='delete_student_appointment.php?id=$temp_id'>CANCEL APPOINTMENT</a></td>";	
						    }	

						    
						    //echo "<td>".$day."d " .$hour."h ".$minutes."m ".$second."s "."</td>";
						    
						 	
                            $temp_time="";
                            $temp_date="";

						 	echo "</tr>";
						 	

					 	}
					 	

					 }
				?>
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