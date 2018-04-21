<?php 
	include("db_connect.php");
	session_start();
?>

<?php 
 	function test_input($data){
 		$data= trim($data);
 		$data=htmlspecialchars($data);
 		$data=stripcslashes($data);
 		return $data;
 	}
	$error_message="";
	$success_message="";
	$user_name=$_SESSION['userName'];
	$supervisor_name= $_SESSION['supervisor_name'];
	
	if (isset($_POST['submit'])){
		if (!empty($_POST['to']) && !empty($_POST['message'])){
			if (strlen($_POST['message'])< 500){
				$to=test_input($_POST['to']);
				$message=test_input($_POST['message']);
				$query_email= $connect->query("SELECT fullName FROM students WHERE email='".$to."' ");
				
				$query_email_fetch=$query_email->fetchAll();
				$query_email_count=count($query_email_fetch);
				
				
				if ($query_email_count > 0){
					foreach ($query_email_fetch as $row) {
						$fullName= $row['fullName'];
					}

					$insert_message=$connect->prepare("INSERT INTO message_$user_name(sender,receiver,message)
														VALUES(:sender,:receiver,:message)");
					$insert_message->execute(array(':sender'=> $supervisor_name,':receiver' => $fullName,':message' => $message ));
					$success_message="<div class='alert alert-success' role='alert'>
		                            Message sent
		                   			 </div>";
					

				}
				else{
					$error_message="<div class='alert alert-danger' role='alert'>
		                            user doesnt exist
		                   			 </div>";
				}

			}
			else{
				$error_message="<div class='alert alert-danger' role='alert'>
		                             max of 500 characters
		                   			 </div>";
			}

		}
		else{
			$error_message="<div class='alert alert-danger' role='alert'>
		                               to or message body is empty
		                   			 </div>";
		}
	}

	// $query_email= $connect->query("SELECT matricNo FROM students ");
	// 		//	$query_email_count=count($query_email->fetchAll());
	// 			$query_email_fetch=$query_email->fetchAll();
	// 			foreach ($query_email_fetch as $row) {
	// 					echo $row['matricNo'];
	// 				}

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
				<li class="supervisor_menu_list"><a href="supervisor_dashboard.php" class="supervisor_menu_link "><i class="fa fa-user" aria-hidden="true"></i> DASHBOARD</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>
				
			</ul>

		</div>
		
		<div class="col-sm-9 body_supervisor">
			<a href="supervisor_logout.php" class="log_out">Log Out</a>
			<br>

			<br>
			<br>
			<?php echo $error_message; 
					echo $success_message;
			?>



			<div class="message_box">
				<br>
				<form method ="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" style="text-align:center;" >

					<label >TO:</label>
					<input class="form-control" type="email" name="to" id="to">
					<br>
					<label>Message:</label>
					<textarea class="form-control" rows="4" type="text" name="message" ></textarea>
					<br>
					<br>
					<input type="submit" class="btn btn-success" name="submit" value=" send message">

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