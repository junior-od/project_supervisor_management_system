<?php 
	include('db_connect.php');

	$full_name_error=$matric_number_error=$email_address_error=$profile_picture_error=$password_error=$confirm_password_error="";

	if($_SERVER['REQUEST_METHOD']=="POST"){
		if(empty($_POST['full_name'])){
			$full_name_error="fill this*";
		}
		else{
			$query_full_name=$connect->query("SELECT * FROM supervisor_management_system.students WHERE fullName='".$_POST['full_name']."'");
			$query_supervisor_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE supervisor_name='".$_POST['full_name']."'");
			$supervisor_name_count=count($query_supervisor_name->fetchAll());
			$full_name_count=count($query_full_name->fetchAll());
			if(!preg_match("/^[a-zA-Z ]*$/", $_POST['full_name'])){
				$full_name_error="re type*";
			}
			else if ($full_name_count > 0 || $supervisor_name_count > 0 ){
				$full_name_error="name exists";
			}
		}


		if (empty($_POST['matric_number'])){
			$matric_number_error="fill this";
		}
		else{
			$query_matric_number=$connect->query("SELECT * FROM supervisor_management_system.students WHERE matricNo='".$_POST['matric_number']."'");
			$matric_number_count=count($query_matric_number->fetchAll());
			if (!preg_match("/^[0-9]*$/", $_POST['matric_number'])){
				$matric_number_error="re type";
			}
			else if (strlen($_POST['matric_number'])< 7 || strlen($_POST['matric_number'])>10){
				$matric_number_error="invalid";
			}
			else if ($matric_number_count > 0){
				$matric_number_error="matric exists";
			}
		}

		if (empty($_POST['email_address'])){
			$email_address_error="fill this*";
		}
		else{
			$query_email_address=$connect->query("SELECT * FROM supervisor_management_system.students WHERE email='".$_POST['email_address']."'");
			$email_address_count=count($query_email_address->fetchAll());
			if (!preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
				$email_address_error="re type";
			}
			else if ($email_address_count > 0){
				$email_address_error=" email exists";
			}
		}


		$avatar_path=('profile_picture/'.$_FILES['avatar']['name']);
		if (!preg_match("!image!", $_FILES['avatar']['type'])){
			$profile_picture_error="must be image format";
		}
		else if (empty($_FILES['avatar']['name'])){
			$profile_picture_error=" ";
			$avatar_path=('profile_picture/default.jpg');
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





		if(!empty($_POST['full_name']) && preg_match("/^[a-zA-Z ]*$/", $_POST['full_name'])){
			if($full_name_count <= 0){
				if(!empty($_POST['matric_number']) && preg_match("/^[0-9]*$/", $_POST['matric_number'])){
					if(strlen($_POST['matric_number'])>= 7 && strlen($_POST['matric_number'])<=10){
						if($matric_number_count <= 0){
							if(!empty($_POST['email_address']) && preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
								if($email_address_count <= 0){
									if(!empty($_POST['password']) && strlen($_POST['password']) >= 6){
										if(!empty($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password']){
											if(preg_match("!image!", $_FILES['avatar']['type'])){//make sure it is an image file
												if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){//copy the image to the profile_picture file
												    //assign a suoervisor to a the student
													$query_supervisor_user_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors");
													$supervisor_user_name_count=count($query_supervisor_user_name->fetchAll());
													//echo $supervisor_user_name_count;
													//generate random number to get a randon supervisor id 
													$random_id=rand(1,$supervisor_user_name_count);
													//echo $random_id;
														
													$query_get_user_name=$connect->prepare("SELECT userName FROM supervisor_management_system.supervisors WHERE id=:id ");
													$query_get_user_name->execute(array(':id' => $random_id));

													foreach($query_get_user_name as $row){
														$supervisor_user_name= $row['userName'];
													}


													$insert_sql="INSERT INTO supervisor_management_system.students(supervisor_user_name,fullName,matricNo,email,profile_picture,password)
																VALUES(:sup_user_name,:full_name,:matric_num,:email,:profile_picture,:password)";
													$query_insert=$connect->prepare($insert_sql);
													
													$full_name=test_input($_POST['full_name']);
													$matric_number=test_input($_POST['matric_number']);
													$email_address=test_input($_POST['email_address']);
													$password=md5($_POST['password']);
													//echo $supervisor_user_name;

													$result=$query_insert->execute(array(':sup_user_name' => $supervisor_user_name, 
														':full_name' => $full_name, ':matric_num' => $matric_number,
														 ':email' => $email_address,':profile_picture' => $avatar_path,':password' => $password));


													$student_message_table="CREATE TABLE message_$matric_number(
														id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
														supervisor_name VARCHAR(60) NOT NULL,
														message VARCHAR(500) NOT NULL

														)";
													$connect->exec($student_message_table);

													header("location:sucessPage_student.php");
												}
											}
											else if (empty($_FILES['avatar']['name'])){
													//assign a suoervisor to a the student
													$query_supervisor_user_name=$connect->query("SELECT * FROM supervisor_management_system.supervisors");
													$supervisor_user_name_count=count($query_supervisor_user_name->fetchAll());
													//echo $supervisor_user_name_count;
													//generate random number to get a randon supervisor id 
													$random_id=rand(1,$supervisor_user_name_count);
													//echo $random_id;
														
													 $query_get_user_name=$connect->prepare("SELECT userName FROM supervisor_management_system.supervisors WHERE id=:id ");
													 $query_get_user_name->execute(array(':id' => $random_id));

													 foreach($query_get_user_name as $row){
													 	$supervisor_user_name= $row['userName'];
													 }


													 $insert_sql="INSERT INTO supervisor_management_system.students(supervisor_user_name,fullName,matricNo,email,profile_picture,password)
													 			VALUES(:sup_user_name,:full_name,:matric_num,:email,:profile_picture,:password)";
													 $query_insert=$connect->prepare($insert_sql);
													
													 $full_name=$_POST['full_name'];
													 $matric_number=$_POST['matric_number'];
													 $email_address=$_POST['email_address'];
													 $avatar_path=('profile_picture/default.jpg');
													 $password=md5($_POST['password']);

													 $result=$query_insert->execute(array(':sup_user_name' => $supervisor_user_name,':full_name' => $full_name, ':matric_num' => $matric_number,':email' => $email_address,':profile_picture' => $avatar_path,':password' => $password));

													 // $student_message_table="CREATE TABLE message_$matric_number(
													 // 	id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
													 // 	supervisor_name VARCHAR(60) NOT NULL,
														// message VARCHAR(500) NOT NULL

														// )";
													 // $connect->exec($student_message_table);


													
												header("location:index.php");
											}

										}
									}
								}
							}
						}

					}
				}
			}
		}
		









	}
	function test_input($data){
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data=trim($data);
		return $data;
	}
	

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
<link href="css/form.css" rel="stylesheet">
<style>
	.body{
	background: url("images/bg.jpg");
	background-repeat: no-repeat;
	overflow-x:hidden;
	overflow-y:auto;
	background-size: cover;
	width:100%;
	height:100vh;
	

}
	</style>
</head>
<body class="body">	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">SUPERVISOR MANAGEMENT SYSTEM</a>
</nav>

 <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
					<div class="col-sm-6 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Sign up now</h3>
                            		<p>As Student:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
									<form role="form"  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" class="registration-form">
											<div class="form-group">
												<label class="sr-only" for="form-first-name">Full name</label>
												<input class="form-first-name form-control" placeholder="Full name..." type="text" name="full_name" onchange="lowerCase()" id="fullName1"><span class="errors"><?php echo $full_name_error; ?> </span>
											</div>
											<div class="form-group">
												<label class="sr-only" for="form-Matric">Matric Number</label>
												<input placeholder="Matric Number..." class=" form-control" type="text" name="matric_number"><span class="errors"><?php echo $matric_number_error; ?> </span>
											</div>
											<div class="form-group">
												<label class="sr-only" for="form-email">Email</label>
												<input placeholder="Email..." class="form-last-name form-control" type="text" name="email_address" id="emailAddress1" onchange="lowerCase()"><span class="errors"><?php echo $email_address_error; ?></span> 
											</div>
											<div class="form-group">
													<label >Choose Profile Picture</label>
													<input   type="file" name="avatar" accept="images/*" ><span class="errors"><?php echo $profile_picture_error; ?> </span>
												</div>
											<div class="form-group">
													<label class="sr-only" for="form-password">Password</label>
													<input placeholder=" Password..." class="form-password form-control" type="password" name="password"><span class="errors"><?php echo $password_error; ?></span>
												 </div>
												 <div class="form-group">
														<label class="sr-only" for="form-password">Confirm Password</label>
														<input  placeholder=" confirm Password..." class="form-password form-control"type="password" name="confirm_password"><span class="errors"><?php echo $confirm_password_error; ?></span> 
													 </div>
											<button type="submit" class="btn btn-primary">Sign me up!</button>
										</form>
										
		                    </div>
                        </div>
				</div>
				</div>
				</div>
				</div>































<nav class="navbar navbars navbar-expand-lg  fixed-bottom ">
	<p class="copyright">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> .All Rights Reserved</p>
</nav>
<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/text_input1.js"></script>

<script src="js/modal.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>