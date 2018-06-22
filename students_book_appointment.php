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
				$end_date = strtotime("21 December 2018");//set the end date of the semester
				$end=date("d-m-Y",$end_date);
				$i=0;
				

				
				while ($start_date < $end_date) {
				  $date_time[$i]=date("d-m-Y", $start_date);
				  $start_date = strtotime("+1 week", $start_date);
				  $i=$i+1;
				}
				
				

				
				if($book_time >= $from_time && $book_time <= $to_time){
					if($book_date_change >= $today_time && $book_date_change < $end_date ){
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
	<link href="css/style.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['fullName']; ?></h3>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="students_home_page.php">
                        <i class="ti-list"></i>
                        <p>Book Appointment</p>
                    </a>
                </li>
                <li>
                    <a href="students_user_profile.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="students_messages.php">
                        <i class="ti-email"></i>
                        <p>Messages <span class="badge bg-green" style="background-color:orangered;color:white;"><?php echo $unread; ?></span></p>
                    </a>
                </li>
                <li>
                    <a href="students_my_appointment.php">
                        <i class="ti-list"></i>
                        <p>My Appontments</p>
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
                    <a class="navbar-brand" href="#"><p>Assigned Supervisor:<?php echo " ". $_SESSION['supervisor_full_name']; ?></p></a>
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
                            <a href="students_log_out.php">
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
                    <div class="col-md-6">
					<div class="header">
							<h4  style="color:#212120;" class="title">Book Appointments</h4>
                            </div>
                        <div class="card" style="background-color: #212120;">
                            <div class="content" >
							
			<?php 
				echo $sucess_message;
				echo $error_message;
			?>		
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
			<div class="form-group">
					<label style="color:#eb4d23">Pick a time:</label>
					<input style="color: #000;"class="form-control  border-input" type="time" name="book_time" placeholder="Enter TIme...">
					</div>
					<div class="form-group">
					<label style="color:#eb4d23">Pick a date:</label>
					<input style="color:#000 ;" class="form-control  border-input" type="date" name="book_date">
					</div>
					<div class="form-group">
					<label style="color:#eb4d23">Send a Message:</label>
					<textarea style="color:#000 ;" class="form-control  border-input" rows="4" name="book_message" placeholder="send message...."></textarea>
					</div>
					<div class="text-center">
					<input type="submit" class="btn btn-danger" name="book_appointment" value="BOOK">
					</div>
				</div>
				</form>
			
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
