<?php 
	include("db_connect.php");
	session_start();

    $error_message="";
    $sucess_message="";
	if(isset($_POST['update_picture'])){
		if(!empty($_FILES['avatar']['name']) && preg_match("!image!", $_FILES['avatar']['type'])){
			$avatar_path=('profile_picture/'.$_FILES['avatar']['name']);
			if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){
				$update_query=$connect->prepare("UPDATE supervisor_management_system.students SET profile_picture='".$avatar_path."' WHERE matricNo='".$_SESSION['matricNo']."'");
				$update_query->execute();
				$_SESSION['profile_picture']=$avatar_path;
				 $sucess_message="<div class='alert alert-success' role='alert'>
              YOUR PROFILE PICTURE UPDATED SUCESSFULLY!
                  </div>";

			}
		// 	
		}
		else{
			 $error_message="<div class='alert alert-danger' role='alert'>
              FAILED TO UPLOAD PICTURE OR SELECT A PICTURE FORMAT
                  </div>";



		}
	}

	if(isset($_POST['update_profile'])){
		$query_full_name=$connect->query("SELECT * FROM supervisor_management_system.students WHERE fullName='".$_POST['full_name']."'");
		$full_name_count=count($query_full_name->fetchAll());
		$query_email_address=$connect->query("SELECT * FROM supervisor_management_system.students WHERE email='".$_POST['email_address']."'");
		$email_address_count=count($query_email_address->fetchAll());

		if(!empty($_POST['full_name']) && !empty($_POST['email_address'])){
			if(preg_match("/^[a-zA-Z ]*$/", $_POST['full_name']) && preg_match("/^([A-Za-z0-9_\.\-]){1,}\@([A-Za-z\.\-]){1,}\.([A-za-z]{2,4})$/", $_POST['email_address'])){
				if($full_name_count <= 0 && $email_address_count <= 0){
					$update_profile_query=$connect->prepare("UPDATE supervisor_management_system.students SET fullName=:name, email=:email WHERE matricNo='".$_SESSION['matricNo']."' ");
					$name=$_POST['full_name'];
					$email=$_POST['email_address'];
					$update_profile_query->execute(array(':name' => $name,':email' => $email));	
					$_SESSION['fullName']=$name;
					$_SESSION['email']=$email;
					 $sucess_message="<div class='alert alert-success' role='alert'>
              YOUR PROFILE  UPDATED SUCESSFULLY!
                  </div>";


				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
              full name or email already exists
                  </div>";

				}
			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
              invalid input
                  </div>";
			}

		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
              enter email or full name
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
			<h3 class="supervisor_heading"><?php echo $_SESSION['fullName']; ?></h3>
			<hr class="horizontal_line">
			<br>
			<ul class="supervisor_menu">
				<li class="supervisor_menu_list"><a href="students_home_page.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i>BOOK APPOINTMENT </a></li>
				<li class="supervisor_menu_list"><a href="students_user_profile.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-user" aria-hidden="true"></i> USER PROFILE</a></li>
				<li class="supervisor_menu_list"><a href="students_messages.php" class="supervisor_menu_link "><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>

			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<p>Supervisor:<?php echo $_SESSION['supervisor_full_name']; ?></p>
			
			<a href="students_log_out.php" class="log_out">Log Out</a>
			<br>
			
			<div class="col-sm-12">
				<?php echo $sucess_message;
					echo $error_message;
				 ?>
				<div class="row">

					<div class="col-sm-3 student_user_profile_1">
						
						<form class="user_profile_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"  enctype="multipart/form-data">
							<img src="<?=  $_SESSION['profile_picture']?>" width="400" height="600" class="img-thumbnail rounded-circle" alt="Sample image">
							<br>
							<br>
							<input type="file" name="avatar"  accept="images/*">
							<br>
							<br>
							<br>
							<input type="submit" value="update picture "  class="update_profile_button" name="update_picture">




						</form>


					</div>
					<div class="col-sm-9 ">
						<div class="student_user_profile_2">
							<form class="user_profile_form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
								<h3>EDIT PROFILE</h3>
								<br>
								
								<input type="text" readonly class="form-control-plaintext"  value="<?php echo "MATRIC NO: ". $_SESSION['matricNo']; ?>">
								
								<br>
								<br>

								<label class="form-check-label">FULL NAME</label>
								<input type="text" class="form-control " id="full_name" name="full_name" onchange="lowerCase()" placeholder="<?php echo $_SESSION['fullName']; ?>">
								<br>
								<br>
								<label class="form-check-label">EMAIL ADDRESS</label>

								<input type="text" class="form-control " id="email" name="email_address" onchange="lowerCase()" placeholder="<?php echo $_SESSION['email']; ?>">
								<br>
								<br>
								<input type="submit" value="save changes"  class="update_profile_button" name="update_profile">


							</form>
							
						</div>

					</div>
				</div>


			</div>

			
			
		</div>
		
		

	

	</div>
</div>











<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script>
	function lowerCase(){
		var c = document.getElementById("full_name");
		c.value=c.value.toLowerCase();

		var d = document.getElementById("email");
		d.value=d.value.toLowerCase();
	}
</script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>