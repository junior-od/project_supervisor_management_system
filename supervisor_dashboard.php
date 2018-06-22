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

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Supervisor Appointment Management System</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
	<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>	
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['userName']; ?></h3>
            </div>

            <ul class="nav">
                <li class="">
                    <a href="supervisor_home_page.php">
                        <i class="ti-list"></i>
                        <p>Appointment List</p>
                    </a>
                </li>
                <li class="active">
                    <a href="supervisor_dashboard.php">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="supervisor_messages.php">
                        <i class="ti-email"></i>
                        <p>Messages <span class="badge bg-green" style="background-color:orangered;color:white;"><?php echo $unread; ?></span></p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li> -->
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
						<li>
                            <a href="supervisor_logout.php">
								<i class="ti-shift-left"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
		<div class="content">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
								<h4 class="title"> APPOINTMENT SCHEDULE</h4>
                            </div>
                            <div class="content  table-responsive table-full-width">
                            <table class="table table-hover">
								<tbody>
			<?php echo $error_message;
					echo $sucess_message; 
			?>
				  <thead>
				    <tr>
				      <th scope="col">DAYS</th>
				      <th scope="col">FROM TIME</th>
				      <th scope="col">TO TIME</th>
				      <th scope="col">MAX. NO OF STUDENTS PER DAY</th>
				      <th scope="col">SET</th>
				    </tr>
				  </thead>
				    <tr>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					<div class="form-group">	
				      <th scope="row"><?php echo $sunday; ?></th>
				      <td><input type="time" name="from_time" class="form-control"></td>
				      <td><input type="time" name="to_time" class="form-control"></td>
				      <td><input type="number" name="max_students" class="form-control" ></td>
					  <td><input type="submit" name="update_sunday" class="btn btn-info" value="update"></td>
					</div>
				     </form>
				    </tr>
				    <tr>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					<div class="form-group">
				      <th scope="row"><?php  echo $monday ;?></th>
				      <td><input type="time" name="from_time_monday" class="form-control"></td>
				      <td><input type="time" name="to_time_monday" class="form-control"></td>
				      <td><input type="number" name="max_students_monday" class="form-control"></td>
					  <td><input type="submit" name="update_monday" class="btn btn-info" value="update"></td>
						</div>
						</form>
				    </tr>
				    <tr>
	
					  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
					  <div class="form-group">
				      <th scope="row"><?php   echo $tuesday; ?></th>
				      <td><input type="time" name="from_time_tuesday" class="form-control"></td>
				      <td><input type="time" name="to_time_tuesday" class="form-control"></td>
				      <td><input type="number" name="max_students_tuesday" class="form-control"></td>
					  <td><input type="submit" name="update_tuesday" class="btn btn-info" value="update"></td>
					</div>
				      </form>
				    </tr>
				     <tr>
					  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					  <div class="form-group">
				      <th scope="row"><?php  echo $wednesday; ?></th>
				      <td><input type="time" name="from_time_wednesday" class="form-control"></td>
				      <td><input type="time" name="to_time_wednesday" class="form-control"></td>
				      <td><input type="number"  name="max_students_wednesday" class="form-control"></td>
					  <td><input type="submit" name="update_wednesday" class="btn btn-info" value="update"></td>
					 </div>
				  </form>
				    </tr>
				     <tr>
					 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					 <div class="form-group">
				      <th scope="row"><?php  echo $thursday; ?></th>
				       <td><input type="time" name="from_time_thursday" class="form-control"></td>
				      <td><input type="time" name="to_time_thursday" class="form-control"></td>
				      <td><input type="number" name="max_students_thursday" class="form-control" ></td>
					  <td><input type="submit" name="update_thursday" class="btn btn-info" value="update"></td>
					</div>
				  </form>
				    </tr>
				     <tr>
					 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					 <div class="form-group">
				      <th scope="row"><?php  echo $friday; ?></th>
				       <td><input type="time" name="from_time_friday" class="form-control"></td>
				      <td><input type="time" name="to_time_friday" class="form-control"></td>
				      <td><input type="number" name="max_students_friday" class="form-control"></td>
					  <td><input type="submit" name="update_friday" class="btn btn-info" value="update"></td>
					</div>
				  </form>
				    </tr>
				     <tr>
					 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
					 <div class="form-group">
				      <th scope="row"><?php  echo $saturday; ?></th>
				      <td><input type="time" name="from_time_saturday" class="form-control"></td>
				      <td><input type="time" name="to_time_saturday" class="form-control"></td>
				      <td><input type="number" name="max_students_saturday" class="form-control"></td>
					  <td><input type="submit" name="update_saturday" class="btn btn-info" value="update"></td>
						</div>
				  </form>
				    </tr>
					</tbody>
					</table> 
                        </div>
                    </div>
                </div>
    </div>


</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

</html>