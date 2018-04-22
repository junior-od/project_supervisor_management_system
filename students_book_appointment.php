<?php 
	include("db_connect.php");
	session_start();
?>


<?php 
    $user_name=$_SESSION['supervisor_user_name'];
	$error_message="";
	$sucess_message="";
	function test_input($data){
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data=trim($data);
		return $data;
	}
	if(isset($_POST['book_appointment'])){
		if (!empty($_POST['book_time']) && !empty($_POST['book_date'])){
			if(!empty($_POST['book_message'])){
				$full_name=$_SESSION['fullName'];
				$day= $_SESSION['days'];
				$from_time= $_SESSION['from_time'];
				$to_time=$_SESSION['to_time'];
				$max_num_students_per_day= $_SESSION['max_num_students_per_day'];
				$book_time=$_POST['book_time'];
				$book_date=$_POST['book_date'];
				date_default_timezone_set("Africa/Lagos");
				$book_date_change=strtotime("$book_date");
				$change_book_date=date("d-m-Y",$book_date_change);
				$book_message=test_input($_POST['book_message']);

				$today_time=strtotime("today");//get todays time
				$today_date=date("d-m-Y",$today_time);
				$date_time=array();//declare empty array to store get available dates till end of semester
				$start_date = strtotime("$day");
				$end_date = strtotime("21 June 2018");//set the end date of the semester
				$end=date("d-m-Y",$end_date);
				$i=0;
				
				while ($start_date < $end_date) {
				  $date_time[$i]=date("d-m-Y", $start_date);
				  $start_date = strtotime("+1 week", $start_date);
				  $i=$i+1;
				}

				
				if($book_time >= $from_time && $book_time <= $to_time){
					if($change_book_date >= $today_date && $book_date < $end ){
						if(in_array($change_book_date, $date_time)){
							$query_appointment_list=$connect->query("SELECT * FROM appointment_$user_name WHERE appointment_date='".$change_book_date."'");
							$query_appointment_list_count=count($query_appointment_list->fetchAll());

							
							if($query_appointment_list_count < $max_num_students_per_day){
								if(strlen($book_message)<=500){
									$query_no_book_twice=$connect->query("SELECT * FROM appointment_$user_name WHERE  appointment_date='".$change_book_date."' AND student_name='".$full_name."'");
									$query_no_book_twice_count=count($query_no_book_twice->fetchAll());

									if ($query_no_book_twice_count <= 0){
										$insert_appointment=$connect->prepare("INSERT INTO appointment_$user_name(student_name,appointment_date,time)
																				VALUES(:student_name,:appointment_date,:time)");
										$insert_appointment->execute(array(':student_name' => $full_name,':appointment_date' => $change_book_date,':time' => $book_time));

										$query_supervisor_name=$connect->query("SELECT supervisor_name FROM supervisors WHERE userName='".$user_name."'");
										$query_supervisor_name_fetch=$query_supervisor_name->fetchAll();
										foreach($query_supervisor_name_fetch as $s){
											$supervisor_name=$s['supervisor_name'];
										}

										 $insert_message=$connect->prepare("INSERT INTO message_$user_name(sender,receiver,message)
																			VALUES(:sender,:receiver,:message)");

										 $insert_message->execute(array(':sender'=> $full_name,':receiver'=> $supervisor_name,':message'=>$book_message));

										 //$insert_appointment_message=$connect->prepare("INSERT INTO message_$user_name(student_name,message)
										// 												VALUES(:stud_name,:message)");
										// $insert_appointment_message->execute(array(':stud_name' => $full_name,':message' => $book_message));

										$sucess_message="<div class='alert alert-success' role='alert'>
		                               BOOKING WAS SUCESSFUL
		                   			 </div>";

									}
									else{
										$error_message="<div class='alert alert-danger' role='alert'>
		                               Already booked an appointment on this day
		                   			 </div>";
									}
								}
								else{
									$error_message="<div class='alert alert-danger' role='alert'>
	                               message should not exceed 500 characters 
	                   			 </div>";

								}
								

							}
							else{
								$error_message="<div class='alert alert-danger' role='alert'>
	                               no available space to make appointment for that day 
	                   			 </div>";

							}

							
						}
						else{
							$error_message="<div class='alert alert-danger' role='alert'>
	                 date is not a $day schedule
	                    </div>";

						}

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                 date is not within the semester schedule
	                    </div>";


					}


				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                 available time is between $from_time to $to_time
	                    </div>";

				}


				

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                 a message is required
	                    </div>";
			}
			

		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                 pick a time or date
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
				<li class="supervisor_menu_list"><a href="students_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES<sup><?php echo $unread; ?></sup></a></li>
				<li class="supervisor_menu_list"><a href="students_my_appointment.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i>MY APPOINTMENTS</a></li>


			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<p>Supervisor:<?php echo $_SESSION['supervisor_full_name']; ?></p>
			
			<a href="students_log_out.php" class="log_out">Log Out</a>
			<br>
			
			<?php 
				echo $sucess_message;
				echo $error_message;
			?>

			<div class="col-sm-12 body_book_appointment">
				
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					<label>Pick a time:</label>
					<br>
					<input class="form-control" type="time" name="book_time">
					<br>
					<label>Pick a date:</label>
					<br>
					<input class="form-control" type="date" name="book_date">
					<br>
					<label>Send a Message:</label>
					<br>
					<textarea class="form-control" rows="4" name="book_message"></textarea>
					<br>
					<input type="submit" class="book_appointment_submit" name="book_appointment" value="BOOK">
				

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