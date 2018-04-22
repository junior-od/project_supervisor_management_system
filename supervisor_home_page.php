<?php 
	include("db_connect.php");
	session_start();
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
			<h3 class="supervisor_heading"><?php echo $_SESSION['userName']; ?></h3>
			<hr class="horizontal_line">
			<br>
			<ul class="supervisor_menu">
				<li class="supervisor_menu_list"><a href="supervisor_home_page.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-list" aria-hidden="true"></i> APPOINTMENT LIST</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_dashboard.php" class="supervisor_menu_link "><i class="fa fa-user" aria-hidden="true"></i> DASHBOARD</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES <sup ><?php echo $unread; ?></sup></a></li>

			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<a href="supervisor_logout.php" class="log_out">Log Out</a>
			<br>
			<br>
			<br>
			<br>

			<div class="appointment_list">
				<table class="table">
					<thead>
					    <tr>
					      <th scope="col">STUDENT NAME</th>

					      <th scope="col">DATE</th>
					      <th scope="col">TIME </th>
					    
					    </tr>
				    </thead>
				    <tbody>
				<?php 
					$user_name= $_SESSION['userName'];
					$query_appointment_list=$connect->query("SELECT id,student_name,appointment_date,time FROM appointment_$user_name ORDER BY appointment_date ASC");
					$appointment_list_fetch=$query_appointment_list->fetchAll();
					 date_default_timezone_set("Africa/Lagos");
					  $today_time=strtotime("today +18hours");//get todays time
					 $today_date=date("d-m-Y H:i:sa",$today_time);
					 



					foreach($appointment_list_fetch as $get){
						if($get['appointment_date'] < $today_date){
							$delete=$connect->exec("DELETE  FROM appointment_$user_name WHERE id='".$get['id']."' AND appointment_date='".$get['appointment_date']."' ");

						}
						else{
							echo "<tr>";
							echo "<td>".$get['student_name']."</td>";
							$temp_name=$get['student_name'];
							$query_matric=$connect->query("SELECT matricNo FROM students WHERE fullName='".$temp_name."'");
							$query_matric_fetch=$query_matric->fetchAll();
							foreach($query_matric_fetch as $fet){
								$temp_matric=$fet['matricNo'];
							}
							echo "<td>".$get['appointment_date']."</td>";
							echo "<td>".$get['time']."</td>";
							$temp_id=$get['id'];
							$temp_appointment_date=$get['appointment_date'];
							$temp_time=$get['time'];
							echo  "<td><button type='submit' class='btn btn-danger ' ><a  class='delete_link' href='supervisor_delete_appointment.php?id=$temp_id&matric=$temp_matric'>CANCEL APPOINTMENT</a></button></td>";		
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