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
    <link href="css/chat.css" rel="stylesheet">
	

</head>
<body >

<div class="wrapper"  >
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['fullName']; ?></h3>
            </div>

            <ul class="nav">
                <li class="">
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
                <li class="active">
                    <a href="students_messages.php">
                        <i class="ti-email"></i>
                        <p>Messages <span class="badge bg-green" style="background-color:orangered;color:white;"><?php echo $unread; ?></span></p>
                    </a>
                </li>
                <li >
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
				<br>
                    <div class="col-md-6">
                        <div class="card">
						<div class="header">
                                <h4 class="title">Chats</h4>
                            </div>
                            <div class="content">
							<ul class="list-unstyled team-members">
							<?php 
					$sender=$_SESSION['supervisor_full_name'];
					$get_inbox_table=$connect->query("SELECT DISTINCT (sender) FROM message_$user_name WHERE receiver='".$full_name."' ORDER BY time_sent DESC");
					$get_inbox_table_fetch=$get_inbox_table->fetchAll();
					
					foreach ($get_inbox_table_fetch as $d) {
					
						

						$sender_i=$d['sender'];
						
						$get_last_date=$connect->query("SELECT MAX(time_sent)AS last_time FROM message_$user_name WHERE (receiver='".$full_name."' AND sender='".$sender."') OR (receiver='".$sender."' AND sender='".$full_name."')");
					    $get_last_date_fetch=$get_last_date->fetchAll();
					    foreach($get_last_date_fetch as $w){
					    	//$w['last_time'];
					    	$last_time=$w['last_time'];
					    	
					    	 $get_last_message=$connect->query("SELECT message FROM message_$user_name WHERE ((receiver='".$full_name."' AND sender='".$sender."') OR (receiver='".$sender."' AND sender='".$full_name."')) AND time_sent='".$last_time."'  ");
							 $get_last_message_fetch=$get_last_message->fetchAll();
							    foreach($get_last_message_fetch as $m){
                                    $get_unopen=$connect->query("SELECT * FROM message_$user_name WHERE (receiver='".$full_name."' AND sender='".$sender."') AND opened='0'");
                                    $get_unopen_count=count($get_unopen->fetchAll());
                                    if ($get_unopen_count > 0){
                                        //echo "<td><span >".$get_unopen_count."</span></td>";
                                    }
                                    else{
                                        $get_unopen_count="";
                                        //echo "<td><span >".$get_unopen_count."</span></td>";
        
                                    }
									echo'<li>
									<div class="row">
										<div class="col-xs-3">
											<div class="avatar">
												<img src="profile_picture/default.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
											</div>
										</div>
										<div style="color:orange;" class="col-xs-6">';
                                        echo $d['sender'];
											echo '<br />
											<span class="text-success"><small>'.$m['message'];
											echo'</small></span>'.
                                        '</div>';
										echo '<div class="col-xs-3 text-right">';
											echo "<a href='students_messages_get.php?sender=$sender'><btn class='btn btn-sm btn-success btn-icon'><i class='fa fa-envelope'></i></btn><sup style='color:red;'>".$get_unopen_count."</sup></a>";
										echo '</div>
									</div>
								</li>';
									
							    	
							    	
							    }
							     echo "</td>";
						
					    	



					    }
					    
					     //echo "<td> <a href='students_chat_room.php?sender=$sender' class='inbox_button'><i class='fa fa-angle-right'></i></td>";
					    echo "</tr>";
					   
					}


				?>
					
				</ul >
					
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