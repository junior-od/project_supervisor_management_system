<?php 
    include('db_connect.php');
    
	$full_name_error=$user_name_error=$email_address_error=$password_error=$confirm_password_error="";

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(empty($_POST['full_name'])){
				$full_name_error="fill this*";
			}
			else{
				$query_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE supervisor_name='".$_POST['full_name']."'");
				$count=count($query_name->fetchAll());
				if (!preg_match("/^[a-zA-Z ]*$/", $_POST['full_name'])){
					$full_name_error="re enter*";
				}
				else if ($count > 0){
					$full_name_error="already exists";
				}
				
				
				
			}

			if (empty($_POST['user_name'])){
				$user_name_error="fill this*";
			}
			else{
				$query_user_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE userName='".$_POST['user_name']."'");
				$user_name_count=count($query_user_name->fetchAll());
				if (!preg_match("/^([A-za-z0-9\_\.\-]){1,}$/", $_POST['user_name'])){
					$user_name_error="re enter*";
				}
				else if($user_name_count > 0){
					$user_name_error ="already exists";
				}
			}

			if (empty($_POST['email_address'])){
				$email_address_error="fill this*";
			}
			else{
				$query_email=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE email='".$_POST['email_address']."'");
				$email_address_count=count($query_email->fetchAll());
				if (!preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
					$email_address_error="re enter*";
				}
				else if ($email_address_count > 0){
					$email_address_error="already exists";
				}
			}

			if (empty($_POST['password'])){
				$password_error="fill this*";
			}
			else if(strlen($_POST['password']) < 6){
				$password_error="not strong enough";
			}

			if ($_POST['password'] !== $_POST['confirm_password']){
				$confirm_password_error="password mismatch";
			}



			if (!empty($_POST['full_name']) && preg_match("/^[a-zA-Z ]*$/", $_POST['full_name'])){
				if(!empty($_POST['user_name']) && preg_match("/^([A-za-z0-9\_\.\-]){1,}$/", $_POST['user_name'])){
					if(!empty($_POST['email_address']) && preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
						if(!empty($_POST['password']) && strlen($_POST['password']) >= 6){
							if(!empty($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password']){
								if ($count <= 0){
									if($user_name_count <= 0){
										if($email_address_count <= 0){
											$insert_sql="INSERT INTO  supervisor_management_system.supervisors (supervisor_name, userName, email,password) 
													    VALUES (:supervisor_name, :user_name, :email, :password)";//pdo using placeholders
														
														$query= $connect->prepare($insert_sql);

													    $full_name = $_POST['full_name'];
													    $user_name = $_POST['user_name'];
													    $email_address =$_POST['email_address'];
													    $password=md5($_POST['password']);
													    

													    $result=$query->execute( array(':supervisor_name'=>$full_name, ':user_name'=>$user_name, ':email'=>$email_address, ':password'=>$password));

													    	//created database for appointment list
													    $appointment_table="CREATE TABLE appointment_$user_name (
													    	id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
														 	student_name VARCHAR(60) NOT NULL,
														 	appointment_date VARCHAR(30) NOT NULL,
														 	time VARCHAR(50) NOT NULL,
														 	message VARCHAR(50) NOT NULL

													    	)";
														$connect->exec($appointment_table);


														//create table for user_message
														$message_table="CREATE TABLE message_$user_name(
															id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
															student_name VARCHAR(60) NOT NULL,
															message VARCHAR(500) NOT NULL

															)";

														$connect->exec($message_table);

															//creates the database for appoint schedule
														$appointment_table="CREATE TABLE appointment_schedule_$user_name(
															id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
															days VARCHAR(30) NOT NULL,
															time VARCHAR(30) NOT NULL,
															max_num_students_per_day int(3)  NOT NULL
															)";
														
														$connect->exec($appointment_table);

														$insert_into_appointment_table=$connect->prepare("INSERT INTO supervisor_management_system.appointment_schedule_$user_name(days,time,max_num_students_per_day)
																							VALUES(:days,:time,:max_num_students_per_day)");

														//insert for sunday
														$days="sunday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for monday
														$days="monday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for tuesday
														$days="tuesday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for wednesday
														$days="wednesday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for thursday
														$days="thursday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for friday
														$days="friday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));

														//insert for saturday
														$days="saturday";
														$time="not available";
														$max_num_students_per_day="0";
														$insert_into_appointment_table->execute(array(':days' => $days,':time' => $time ,':max_num_students_per_day' => $max_num_students_per_day));
														header("location:sucessPage_supervisor.php");
													    
										}
									}
								}


								
							}
						}
					}
				}
			}



		}

	

	//close connection
	$connect=null;

	


?>


<!DOCTYPE html>
<html>
<head>
<title>Sign Up Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body class="body">
<nav class="navbar navbars navbar-expand-lg  fixed-top ">
	<ul class="index_list">
		<li class="index_list_style"><a class="navbar-brand" href="index.php " >SUPERVISOR</a></li>
	</ul>
</nav>
<br>
<br>
<br>

<div class="col-sm-12">
	<div class="container_form">
		<form class="supervisor_sign_up_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
			<h4 class="sign_up_title_style">SIGN UP HERE as <span class="supervisor_type">Supervisor</span></h4>
			<label class="sign_up_style">Full Name</label><br>
			<input type="text" name="full_name" id="fullName" onchange="lowerCase()"><span class="errors"><?php echo $full_name_error; ?></span><br>


			<label class="sign_up_style">User Name </label><br>
			<input type="text" name="user_name" onchange="lowerCase()" id="userName"><span class="errors"><?php echo $user_name_error; ?></span><br>

			<label class="sign_up_style">Email Address</label><br>
			<input type="text" name="email_address" id="emailAddress" onchange="lowerCase()"><span class="errors"><?php echo $email_address_error; ?></span><br>

			<label class="sign_up_style">Password</label><br>
			<input type="password" name="password"><span class="errors"><?php echo $password_error; ?></span></br>

			<label class="sign_up_style">Confirm Password</label><br>
			<input type="password" name="confirm_password"><span class="errors"><?php echo $confirm_password_error; ?></span><br>
			<br>

			<input type="submit" class="sign_up_button_for_reg" value="SIGN UP">
		</form>
	</div>
</div>































<nav class="navbar navbars navbar-expand-lg  fixed-bottom ">
	<p class="copyright">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> .All Rights Reserved</p>
</nav>
<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/text_input.js"></script>
<script src="js/modal.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>