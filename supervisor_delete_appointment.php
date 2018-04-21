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
				<li class="supervisor_menu_list"><a href="supervisor_home_page.php" class="supervisor_menu_link"><i class="fa fa-list" aria-hidden="true"></i> APPOINTMENT LIST</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_dashboard.php" class="supervisor_menu_link "><i class="fa fa-user" aria-hidden="true"></i> DASHBOARD</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>

			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<a href="supervisor_logout.php" class="log_out">Log Out</a>
			<br>
			<br>
			<br>
			<div class="appointment_delete">
			
				<form method="get" action=<?php echo "delete_appointment.php"; ?> style="text-align:center;">
					<h6>STUDENT NAME : <?php echo $name;?></h6>
					<h6>MATRIC NO : <?php echo $matric;?></h6>

					<h6>APPOINTMENT DATE : <?php echo $date;?></h6>
					<h6>APPOINTMENT TIME : <?php echo $time;?></h6>
					<label>MESSAGE</label>
					<textarea class="form-control" type="text" rows="3" style="width:100%;" name="message"></textarea>
					<br>
				
					<input type="submit" class="btn btn-danger" value="CANCEL APPOINTMENT">


				</form>


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