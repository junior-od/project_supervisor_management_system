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

<!DOCTYPE html>
<html>
<head>
<title>Supervisor Appointment Management System|</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


</head>
<body>		
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-3 side_nav_supervisor bg-secondary">
			<h3 class="supervisor_heading"><?php echo $_SESSION['fullName']; ?></h3>
			<hr class="horizontal_line">
			<br>
			<ul class="supervisor_menu">
				<li class="supervisor_menu_list"><a href="students_home_page.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-list" aria-hidden="true"></i>BOOK APPOINTMENT </a></li>
				<li class="supervisor_menu_list"><a href="students_user_profile.php" class="supervisor_menu_link "><i class="fa fa-user" aria-hidden="true"></i> USER PROFILE</a></li>
				<li class="supervisor_menu_list"><a href="students_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>
				<li class="supervisor_menu_list"><a href="students_my_appointment.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i>MY APPOINTMENTS</a></li>


			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<p>Supervisor:<?php echo $_SESSION['supervisor_full_name']; ?></p>
			
			<a href="students_log_out.php" class="log_out">Log Out</a>
			<br>
			<div class="col-sm-12 body_book_appointment">
				<table class="table">
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











<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>