<?php 
	include("db_connect.php");
	session_start();
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
				<li class="supervisor_menu_list"><a href="students_home_page.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i>BOOK APPOINTMENT </a></li>
				<li class="supervisor_menu_list"><a href="students_user_profile.php" class="supervisor_menu_link "><i class="fa fa-user" aria-hidden="true"></i> USER PROFILE</a></li>
				<li class="supervisor_menu_list"><a href="students_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>
				<li class="supervisor_menu_list"><a href="students_my_appointment.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-list" aria-hidden="true"></i>MY APPOINTMENTS</a></li>
				
			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<p>Supervisor:<?php echo $_SESSION['supervisor_full_name']; ?></p>
			<a href="students_log_out.php" class="log_out">Log Out</a>
			<br>
			<div class="body_view_appointment">
				<table class="table">
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
						


					 	 if ($ap_date < $today_date){
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



						    $day=ceil(($end_appointment_cancel -time())/60/60/24);
						    $hour=ceil(($end_appointment_cancel -time())/60/60);
						    $minutes=ceil(($end_appointment_cancel -time())/60);
						    $second=ceil(($end_appointment_cancel -time()));
                            

						 
						   // echo "<script>";
						   // echo "var x =" .json_encode($end_appointment_cancel).";";
						   // echo "var ";
						   // echo "var now=new Date().getTime();";
						   // echo "alert(x-now)";
						   // echo "</script>";

						    
						    if ($now_time_date > $end_appointment_cancel_time){
						    	echo  "<td><button type='submit' class='btn btn-danger disabled' >CANCEL APPOINTMENT</button></td>";	
						    }
						    else{
						    	echo  "<td><button type='submit' class='btn btn-danger ' ><a  class='delete_link' href='delete_student_appointment.php?id=$temp_id'>CANCEL APPOINTMENT</a></button></td>";	
						    }	
						    echo "<td>".$day."d " .$hour."h ".$minutes."m ".$second."s "."</td>";
						    
						 	
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











<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>