<?php 
	include("db_connect.php");
	session_start();

	$sunday="sunday";
	$monday = "monday ";
	$tuesday = "tuesday ";
	$wednesday="wednesday";
	$thursday="thursday";
	$friday="friday";
	$saturday="saturday";

		$error_message="";
		$sucess_message="";

	if(isset($_POST['update_sunday'])){
		if(!empty($_POST['from_time']) && !empty($_POST['to_time'])){
			if($_POST['from_time'] > "08:59"  && $_POST['from_time'] < "16:59"){
				if($_POST['to_time'] > $_POST['from_time'] && $_POST['to_time'] < "18:01"){
					if(!empty($_POST['max_students']) && ($_POST['max_students']>0 && $_POST['max_students']< 11)){
						$from_time=$_POST['from_time'];
						$to_time=$_POST['to_time'];
						$max_students=$_POST['max_students'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time."',to_time='".$to_time."', max_num_students_per_day='".$max_students."' WHERE days='".$sunday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your sunday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
		
			

	}

	if(isset($_POST['update_monday'])){
		if(!empty($_POST['from_time_monday']) && !empty($_POST['to_time_monday'])){
			if($_POST['from_time_monday'] > "08:59"  && $_POST['from_time_monday'] < "16:59"){
				if($_POST['to_time_monday'] > $_POST['from_time_monday'] && $_POST['to_time_monday'] < "18:01"){
					if(!empty($_POST['max_students_monday']) && ($_POST['max_students_monday']>0 && $_POST['max_students_monday']< 11)){
						$from_time_monday=$_POST['from_time_monday'];
						$to_time_monday=$_POST['to_time_monday'];
						$max_students_monday=$_POST['max_students_monday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_monday."',to_time='".$to_time_monday."', max_num_students_per_day='".$max_students_monday."' WHERE days='".$monday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your monday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
			
	        
		
	}

	if(isset($_POST['update_tuesday'])){
		if(!empty($_POST['from_time_tuesday']) && !empty($_POST['to_time_tuesday'])){
			if($_POST['from_time_tuesday'] > "08:59"  && $_POST['from_time_tuesday'] < "16:59"){
				if($_POST['to_time_tuesday'] > $_POST['from_time_tuesday'] && $_POST['to_time_tuesday'] < "18:01"){
					if(!empty($_POST['max_students_tuesday']) && ($_POST['max_students_tuesday']>0 && $_POST['max_students_tuesday']< 11)){
						$from_time_tuesday=$_POST['from_time_tuesday'];
						$to_time_tuesday=$_POST['to_time_tuesday'];
						$max_students_tuesday=$_POST['max_students_tuesday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_tuesday."',to_time='".$to_time_tuesday."', max_num_students_per_day='".$max_students_tuesday."' WHERE days='".$tuesday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your tuesday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
		
		
	}


	if(isset($_POST['update_wednesday'])){
		if(!empty($_POST['from_time_wednesday']) && !empty($_POST['to_time_wednesday'])){
			if($_POST['from_time_wednesday'] > "08:59"  && $_POST['from_time_wednesday'] < "16:59"){
				if($_POST['to_time_wednesday'] > $_POST['from_time_wednesday'] && $_POST['to_time_wednesday'] < "18:01"){
					if(!empty($_POST['max_students_wednesday']) && ($_POST['max_students_wednesday']>0 && $_POST['max_students_wednesday']< 11)){
						$from_time_wednesday=$_POST['from_time_wednesday'];
						$to_time_wednesday=$_POST['to_time_wednesday'];
						$max_students_wednesday=$_POST['max_students_wednesday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_wednesday."',to_time='".$to_time_wednesday."', max_num_students_per_day='".$max_students_wednesday."' WHERE days='".$wednesday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your wednesday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
	
	}

	if(isset($_POST['update_thursday'])){
		if(!empty($_POST['from_time_thursday']) && !empty($_POST['to_time_thursday'])){
			if($_POST['from_time_thursday'] > "08:59"  && $_POST['from_time_thursday'] < "16:59"){
				if($_POST['to_time_thursday'] > $_POST['from_time_thursday'] && $_POST['to_time_thursday'] < "18:01"){
					if(!empty($_POST['max_students_thursday']) && ($_POST['max_students_thursday']>0 && $_POST['max_students_thursday']< 11)){
						$from_time_thursday=$_POST['from_time_thursday'];
						$to_time_thursday=$_POST['to_time_thursday'];
						$max_students_thursday=$_POST['max_students_thursday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_thursday."',to_time='".$to_time_thursday."', max_num_students_per_day='".$max_students_thursday."' WHERE days='".$thursday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your thursday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}

	}

	if(isset($_POST['update_friday'])){
		if(!empty($_POST['from_time_friday']) && !empty($_POST['to_time_friday'])){
			if($_POST['from_time_friday'] > "08:59"  && $_POST['from_time_friday'] < "16:59"){
				if($_POST['to_time_friday'] > $_POST['from_time_friday'] && $_POST['to_time_friday'] < "18:01"){
					if(!empty($_POST['max_students_friday']) && ($_POST['max_students_friday']>0 && $_POST['max_students_friday']< 11)){
						$from_time_friday=$_POST['from_time_friday'];
						$to_time_friday=$_POST['to_time_friday'];
						$max_students_friday=$_POST['max_students_friday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_friday."',to_time='".$to_time_friday."', max_num_students_per_day='".$max_students_friday."' WHERE days='".$friday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your friday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
		
	}

	if(isset($_POST['update_saturday'])){
		if(!empty($_POST['from_time_saturday']) && !empty($_POST['to_time_saturday'])){
			if($_POST['from_time_saturday'] > "08:59"  && $_POST['from_time_saturday'] < "16:59"){
				if($_POST['to_time_saturday'] > $_POST['from_time_saturday'] && $_POST['to_time_saturday'] < "18:01"){
					if(!empty($_POST['max_students_saturday']) && ($_POST['max_students_saturday']>0 && $_POST['max_students_saturday']< 11)){
						$from_time_saturday=$_POST['from_time_saturday'];
						$to_time_saturday=$_POST['to_time_saturday'];
						$max_students_saturday=$_POST['max_students_saturday'];
						$user_name=$_SESSION['userName'];
	         			$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET from_time='".$from_time_saturday."',to_time='".$to_time_saturday."', max_num_students_per_day='".$max_students_saturday."' WHERE days='".$saturday."'");

	         			$query->execute();
	         			$sucess_message="<div class='alert alert-success' role='alert'>
	         	         Your saturday schedule has been updated
	         	          </div>";

					}
					else{
						$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: maximum student must not exceed 10
	                    </div>";

					}

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: input a time higher than your start time
	                    </div>";

				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: working hours is between 9:00am to 18:00pm
	                    </div>";
			}


		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                    </div>";
		}
		// if ($_POST['time_saturday'] !=="not available"){
	 //         	if(!empty($_POST['max_students_saturday']) && ($_POST['max_students_saturday']>0 && $_POST['max_students_saturday']< 11)){
	 //         		$time_saturday=$_POST['time_saturday'];
	 //         		$max_students_saturday=$_POST['max_students_saturday'];
	 //         		$user_name=$_SESSION['userName'];
	         		
	 //         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_saturday."', max_num_students_per_day='".$max_students_saturday."' WHERE days='".$saturday."'");

	 //         		$query->execute();
	 //         		$sucess_message="<div class='alert alert-success' role='alert'>
	 //                  Your saturday schedule has been updated
	 //                   </div>";

	 //         	}
	 //         	else{
	 //         		$error_message="<div class='alert alert-danger' role='alert'>
	 //                  ERROR MESSAGE: max. students must not exceed 10
	 //                   </div>";
	 //         	}
	         		


	 //         }
	 //         else{
	 //         	$error_message="<div class='alert alert-danger' role='alert'>
	 //                  ERROR MESSAGE:     set time or max. students
	 //                   </div>";

	 //         }
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
				<li class="supervisor_menu_list"><a href="supervisor_home_page.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i> APPOINTMENT LIST</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_dashboard.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-user" aria-hidden="true"></i> DASHBOARD</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link"><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES <sup ><?php echo $unread; ?></sup></a></li>
				
			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<a href="supervisor_logout.php" class="log_out">Log Out</a>
			<br>
			<br>
			<br>
			
			<?php echo $error_message;
					echo $sucess_message; 
			?>
			<div class="col-sm-12 supervisor_schedule">
				<table class="table">
					<h3>APPOINTMENT SCHEDULE</h3>
				  <thead>
				    <tr>
				      <th scope="col">DAYS</th>
				      <th scope="col">FROM TIME</th>
				      <th scope="col">TO TIME</th>
				      <th scope="col">MAX. NO OF STUDENTS PER DAY</th>
				      <th scope="col">SET</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">	
				      <th scope="row"><?php echo $sunday; ?></th>
				      <td><input type="time" name="from_time" class="form-control"></td>
				      <td><input type="time" name="to_time" class="form-control"></td>

				      <td><input type="number" name="max_students" class="form-control" ></td>
				      <td><input type="submit" name="update_sunday" class="button_for_appoint" value="update"></td>
				     </form>
				    </tr>
				    <tr>
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $monday ;?></th>
				      <td><input type="time" name="from_time_monday" class="form-control"></td>
				      <td><input type="time" name="to_time_monday" class="form-control"></td>
				      <td><input type="number" name="max_students_monday" class="form-control"></td>
				      <td><input type="submit" name="update_monday" class="button_for_appoint" value="update"></td>
				    </tr>
				    <tr>
				      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
				      <th scope="row"><?php   echo $tuesday; ?></th>
				      <td><input type="time" name="from_time_tuesday" class="form-control"></td>
				      <td><input type="time" name="to_time_tuesday" class="form-control"></td>
				      <td><input type="number" name="max_students_tuesday" class="form-control"></td>
				      <td><input type="submit" name="update_tuesday" class="button_for_appoint" value="update"></td>
				      </form>
				    </tr>
				     <tr>
				      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $wednesday; ?></th>
				      <td><input type="time" name="from_time_wednesday" class="form-control"></td>
				      <td><input type="time" name="to_time_wednesday" class="form-control"></td>
				      <td><input type="number"  name="max_students_wednesday" class="form-control"></td>
				      <td><input type="submit" name="update_wednesday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $thursday; ?></th>
				       <td><input type="time" name="from_time_thursday" class="form-control"></td>
				      <td><input type="time" name="to_time_thursday" class="form-control"></td>
				      <td><input type="number" name="max_students_thursday" class="form-control" ></td>
				      <td><input type="submit" name="update_thursday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $friday; ?></th>
				       <td><input type="time" name="from_time_friday" class="form-control"></td>
				      <td><input type="time" name="to_time_friday" class="form-control"></td>
				      <td><input type="number" name="max_students_friday" class="form-control"></td>
				      <td><input type="submit" name="update_friday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $saturday; ?></th>
				      <td><input type="time" name="from_time_saturday" class="form-control"></td>
				      <td><input type="time" name="to_time_saturday" class="form-control"></td>
				      <td><input type="number" name="max_students_saturday" class="form-control"></td>
				      <td><input type="submit" name="update_saturday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
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