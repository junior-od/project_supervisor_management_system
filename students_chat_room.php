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

    $sender=$_GET['sender'];
	$_SESSION['sender']=$_GET['sender'];
	$update_opened= $connect->prepare("UPDATE message_$user_name SET opened='1' WHERE sender='".$sender."' AND receiver='".$full_name."' ");
	$update_opened->execute();
	


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
				<li class="supervisor_menu_list"><a href="students_messages.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES<sup><?php echo $unread; ?></sup></a></li>
				<li class="supervisor_menu_list"><a href="students_my_appointment.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i>MY APPOINTMENTS</a></li>

			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<p>Supervisor:<?php echo $_SESSION['supervisor_full_name']; ?></p>
			<a href="students_log_out.php" class="log_out">Log Out</a>
			<br>
			<div class="message_box">
				<a href="students_messages.php"><i style="font-size:20px;" class="fa fa-angle-left" aria-hidden="true">  <?php echo $_SESSION['sender']; ?></i></a><br>
				<div class="conversations">
					<table style=" width:100%; height:auto;">
					<?php 

					    $query_history=$connect->query("SELECT sender,message,time_sent FROM message_$user_name WHERE (sender='".$full_name."' AND receiver='".$sender."') OR (sender='".$sender."' AND receiver='".$full_name."') ORDER BY time_sent DESC");
						$query_history_fetch=$query_history->fetchAll();
						foreach ($query_history_fetch as $fet) {
							$time=strtotime($fet['time_sent']);
							 $time_sent=date("d-m-Y H:i",$time);
							if($fet['sender'] == $sender){
								echo "<tr>";

								echo "<td style='float:left;background-color:black; width:400px; border-radius:5px; color:white;'><h6>".$fet['sender']."</h6>";
								echo $fet['message']."<span style='float:right'>".$time_sent."</span>"."</td>";
								// echo $time_sent;

								echo "</tr>";

							}
							else{
								echo "<tr>";

								echo "<td style='float:right;background-color:black; width:400px; border-radius:5px; color:white'><h6>".$fet['sender']."</h6>";
								echo $fet['message']."<span style='float:right'>".$time_sent."</span>"."</td>";
								// echo $time_sent;

								echo "</tr>";

							}
							
						}


					?>
					</table >

				</div>
					
				<form action="students_chat_send.php" method="get">
					<textarea rows="3" name="message" class="form-control" ></textarea>
					<br>
					<input class="btn btn-success" type="submit" value="send">


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