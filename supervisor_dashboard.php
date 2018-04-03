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
		
			
	         if ($_POST['time'] !=="not available"){
	         	if(!empty($_POST['max_students']) && ($_POST['max_students']>0 && $_POST['max_students']< 11)){
	         		$time=$_POST['time'];
	         		$max_students=$_POST['max_students'];
	         		$user_name=$_SESSION['userName'];
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time."', max_num_students_per_day='".$max_students."' WHERE days='".$sunday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your sunday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
			
	         if ($_POST['time_monday'] !=="not available"){
	         	if(!empty($_POST['max_students_monday']) && ($_POST['max_students_monday']>0 && $_POST['max_students_monday']< 11)){
	         		$time_monday=$_POST['time_monday'];
	         		$max_students_monday=$_POST['max_students_monday'];
	         		$user_name=$_SESSION['userName'];
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_monday."', max_num_students_per_day='".$max_students_monday."' WHERE days='".$monday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your monday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
		if ($_POST['time_tuesday'] !=="not available"){
	         	if(!empty($_POST['max_students_tuesday']) && ($_POST['max_students_tuesday']>0 && $_POST['max_students_tuesday']< 11)){
	         		$time_tuesday=$_POST['time_tuesday'];
	         		$max_students_tuesday=$_POST['max_students_tuesday'];
	         		$user_name=$_SESSION['userName'];
	         		
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_tuesday."', max_num_students_per_day='".$max_students_tuesday."' WHERE days='".$tuesday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your tuesday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
		if ($_POST['time_wednesday'] !=="not available"){
	         	if(!empty($_POST['max_students_wednesday']) && ($_POST['max_students_wednesday']>0 && $_POST['max_students_wednesday']< 11)){
	         		$time_wednesday=$_POST['time_wednesday'];
	         		$max_students_wednesday=$_POST['max_students_wednesday'];
	         		$user_name=$_SESSION['userName'];
	         		
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_wednesday."', max_num_students_per_day='".$max_students_wednesday."' WHERE days='".$wednesday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your wednesday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
		if ($_POST['time_thursday'] !=="not available"){
	         	if(!empty($_POST['max_students_thursday']) && ($_POST['max_students_thursday']>0 && $_POST['max_students_thursday']< 11)){
	         		$time_thursday=$_POST['time_thursday'];
	         		$max_students_thursday=$_POST['max_students_thursday'];
	         		$user_name=$_SESSION['userName'];
	         		
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_thursday."', max_num_students_per_day='".$max_students_thursday."' WHERE days='".$thursday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your thursday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
		if ($_POST['time_friday'] !=="not available"){
	         	if(!empty($_POST['max_students_friday']) && ($_POST['max_students_friday']>0 && $_POST['max_students_friday']< 11)){
	         		$time_friday=$_POST['time_friday'];
	         		$max_students_friday=$_POST['max_students_friday'];
	         		$user_name=$_SESSION['userName'];
	         		
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_friday."', max_num_students_per_day='".$max_students_friday."' WHERE days='".$friday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your friday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
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
		if ($_POST['time_saturday'] !=="not available"){
	         	if(!empty($_POST['max_students_saturday']) && ($_POST['max_students_saturday']>0 && $_POST['max_students_saturday']< 11)){
	         		$time_saturday=$_POST['time_saturday'];
	         		$max_students_saturday=$_POST['max_students_saturday'];
	         		$user_name=$_SESSION['userName'];
	         		
	         		$query=$connect->prepare("UPDATE supervisor_management_system.appointment_schedule_$user_name SET time='".$time_saturday."', max_num_students_per_day='".$max_students_saturday."' WHERE days='".$saturday."'");

	         		$query->execute();
	         		$sucess_message="<div class='alert alert-success' role='alert'>
	                  Your saturday schedule has been updated
	                   </div>";

	         	}
	         	else{
	         		$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE: max. students must not exceed 10
	                   </div>";
	         	}
	         		


	         }
	         else{
	         	$error_message="<div class='alert alert-danger' role='alert'>
	                  ERROR MESSAGE:     set time or max. students
	                   </div>";

	         }
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
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link"><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>
				
			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<a href="index.php" class="log_out">Log Out</a>
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
				      <th scope="col">TIME</th>
				      <th scope="col">MAXIMUM NUMBER OF STUDENTS PER DAY</th>
				      <th scope="col">SET</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">	
				      <th scope="row"><?php echo $sunday; ?></th>
				      <td><select name="time"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students" ></td>
				      <td><input type="submit" name="update_sunday" class="button_for_appoint" value="update"></td>
				     </form>
				    </tr>
				    <tr>
				    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $monday ;?></th>
				      <td><select name="time_monday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students_monday" ></td>
				      <td><input type="submit" name="update_monday" class="button_for_appoint" value="update"></td>
				    </tr>
				    <tr>
				      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
				      <th scope="row"><?php   echo $tuesday; ?></th>
				      <td><select name="time_tuesday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students_tuesday"></td>
				      <td><input type="submit" name="update_tuesday" class="button_for_appoint" value="update"></td>
				      </form>
				    </tr>
				     <tr>
				      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $wednesday; ?></th>
				      <td><select name="time_wednesday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number"  name="max_students_wednesday" ></td>
				      <td><input type="submit" name="update_wednesday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $thursday; ?></th>
				      <td><select name="time_thursday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students_thursday" ></td>
				      <td><input type="submit" name="update_thursday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $friday; ?></th>
				      <td><select name="time_friday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students_friday"></td>
				      <td><input type="submit" name="update_friday" class="button_for_appoint" value="update"></td>
				  </form>
				    </tr>
				     <tr>
				     <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
				      <th scope="row"><?php  echo $saturday; ?></th>
				      <td><select name="time_saturday"><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" name="max_students_saturday"></td>
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