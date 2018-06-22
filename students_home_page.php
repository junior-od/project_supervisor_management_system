<?php 
	include("db_connect.php");
	session_start();
?>


<?php 
		 $user_name=$_SESSION['supervisor_user_name'];
		if(isset($_POST['book_appointment_sunday'])){
		    $query_sunday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='sunday'");

		    $query_sunday_fetch=$query_sunday->fetchAll();
		    foreach ($query_sunday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_monday'])){
			$query_monday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='monday'");

		    $query_monday_fetch=$query_monday->fetchAll();
		    foreach ($query_monday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
				   		
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_tuesday'])){
		    $query_tuesday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='tuesday'");

		    $query_tuesday_fetch=$query_tuesday->fetchAll();
		    foreach ($query_tuesday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
			
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_wednesday'])){
			$query_wednesday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='wednesday'");

		    $query_wednesday_fetch=$query_wednesday->fetchAll();
		    foreach ($query_sunday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
				   		
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_thursday'])){
			$query_thursday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='thursday'");

		    $query_thursday_fetch=$query_thursday->fetchAll();
		    foreach ($query_thursday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
				   		
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_friday'])){
			$query_friday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='friday'");

		    $query_friday_fetch=$query_friday->fetchAll();
		    foreach ($query_friday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
				   		
			header("location:students_book_appointment.php");
		}

		if(isset($_POST['book_appointment_saturday'])){
			$query_saturday=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name WHERE days='saturday'");

		    $query_saturday_fetch=$query_saturday->fetchAll();
		    foreach ($query_saturday_fetch as $row1) {
		    	$_SESSION['days']=$row1['days'];
		    	$_SESSION['from_time']=$row1['from_time'];
		    	$_SESSION['to_time']=$row1['to_time'];
		    	$_SESSION['max_num_students_per_day']=$row1['max_num_students_per_day'];
		    	
		    }
				   		
			header("location:students_book_appointment.php");
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
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                <li class="active">
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="content  table-responsive table-full-width">
                            <table class="table table-hover">
					<thead>
					    <tr>
					      <th scope="col">DAYS</th>
					      <th scope="col">FROM </th>
					      <th scope="col">TO </th>
					      <th scope="col">MAX. NO OF STUDENTS PER DAY</th>
					      <th scope="col"></th>
					    </tr>
				    </thead>
				    <tbody>
				   <?php 
				  
				  
				  
				   	$query_appointment_table=$connect->query("SELECT days,from_time,to_time,max_num_students_per_day FROM appointment_schedule_$user_name ");
				   	$query_appointment_list=  $query_appointment_table->fetchAll();
				   
				   	foreach($query_appointment_list as $row){
				   		echo "<form method='post' action='students_home_page.php'>";
				   		echo "<tr>";
				   		echo "<th>". $row['days']."</th>" ;
				   		$day=$row['days'];
				   		
				   		echo "<td>". $row['from_time']."</td>" ;
				   		echo "<td>". $row['to_time']."</td>" ;
				   		echo "<td>". $row['max_num_students_per_day']."</td>";
				   		if ($row['max_num_students_per_day'] == 0){
				   			echo "<td><button type='submit' class='btn btn-primary disabled'>BOOK APPOINTMENT</button></td>";

				   		}
				   		else{
				   			echo "<td><input type='submit' class='btn btn-primary ' name='book_appointment_$day' value='BOOK APPOINTMENT'></td>";

				   		}
				   		

				   		echo "</tr>";
				   		echo "</form>";

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
