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
				
				<table style=" width:100%;">
					<h2>CHATS</h2>
				<?php 
					$sender=$_SESSION['supervisor_full_name'];
					$get_inbox_table=$connect->query("SELECT DISTINCT (sender) FROM message_$user_name WHERE receiver='".$full_name."' ORDER BY time_sent DESC");
					$get_inbox_table_fetch=$get_inbox_table->fetchAll();
					
					foreach ($get_inbox_table_fetch as $d) {
						echo "<tr>";
						echo "<td>";
						echo "<h2>".$d['sender']."</h2>"."  ";

						$sender_i=$d['sender'];
						
						$get_last_date=$connect->query("SELECT MAX(time_sent)AS last_time FROM message_$user_name WHERE (receiver='".$full_name."' AND sender='".$sender."') OR (receiver='".$sender."' AND sender='".$full_name."')");
					    $get_last_date_fetch=$get_last_date->fetchAll();
					    foreach($get_last_date_fetch as $w){
					    	//$w['last_time'];
					    	$last_time=$w['last_time'];
					    	
					    	 $get_last_message=$connect->query("SELECT message FROM message_$user_name WHERE ((receiver='".$full_name."' AND sender='".$sender."') OR (receiver='".$sender."' AND sender='".$full_name."')) AND time_sent='".$last_time."'  ");
							 $get_last_message_fetch=$get_last_message->fetchAll();
							    foreach($get_last_message_fetch as $m){
							    	echo "<p>".$m['message']."</p>";
							    	
							    }
							     echo "</td>";
							    $get_unopen=$connect->query("SELECT * FROM message_$user_name WHERE (receiver='".$full_name."' AND sender='".$sender."') AND opened='0'");
					    	$get_unopen_count=count($get_unopen->fetchAll());
					    	if ($get_unopen_count > 0){
					    		echo "<td><span >".$get_unopen_count."</span></td>";
					    	}
					    	else{
					    		$get_unopen_count="";
					    		echo "<td><span >".$get_unopen_count."</span></td>";

					    	}
					    	



					    }
					    
					     echo "<td> <a href='students_chat_room.php?sender=$sender' class='inbox_button'><i class='fa fa-angle-right'></i></td>";
					    echo "</tr>";
					   
					}


				?>
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