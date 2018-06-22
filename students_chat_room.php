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

    $sender=$_SESSION['sender'];
	$update_opened= $connect->prepare("UPDATE message_$user_name SET opened='1' WHERE sender='".$sender."' AND receiver='".$full_name."' ");
	$update_opened->execute();
	
	


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
				<a class="card"href="students_messages.php"> <div class=" author"><i class="fa fa-chevron-left"></i> <img class="avatar border-white"src="profile_picture/default.jpg" draggable="false"/><?php echo $_SESSION['sender']; ?></div></a>
				<br>
                    <div class="col-md-12"style=" overflow-y:auto;height:50vh;">
                        <div class="card" style="background-image:url('images/bg1.png');">
                            <div class="content  table-responsive table-full-width">
    						<table class="table " id="room">
					<?php 
					    $query_history=$connect->query("SELECT id,sender,message,time_sent,receiver_delete,sender_delete FROM message_$user_name WHERE (sender='".$full_name."' AND receiver='".$sender."') OR (sender='".$sender."' AND receiver='".$full_name."') ORDER BY time_sent DESC");
						$query_history_fetch=$query_history->fetchAll();
						foreach ($query_history_fetch as $fet) {
							$time=strtotime($fet['time_sent']);
							 $time_sent=date("d-m-Y H:i",$time);
							 
							if($fet['sender'] == $sender){
                                if ($fet['sender_delete'] == 0){
                                    $message_delete_id=$fet['id'];
    								echo ' <ol class="chat">';
    								echo' <li class="other">';
    								echo ' <div class="msg">';
                                   //receiver  on the left side
    								echo '<div style="color:orange;">'.$fet['sender']."</div>"."</td>"."<br>";
    								echo $fet['message']."</td><a href='students_delete_message.php?id=$message_delete_id' class='del' style='color:red;cursor:pointer'><i class='fa fa-close'></i></a>";
    								echo "<p>".$time_sent."</p>";
    								echo' </li>';
    								echo ' </div>';
                                }
							
								

							}
							else{
                                if ($fet['receiver_delete'] == 0){
                                    $message_delete_id=$fet['id'];
    								echo ' <ol class="chat">';
    								echo' <li class="self">';
    								echo ' <div class="msg">';
                                 //sender  on the right side
    								echo '<div style="color:red;">'. $fet['sender']."</div>"."</td>"."<br>";
    								echo $fet['message']."<a href='students_delete_message2.php?id=$message_delete_id' class='del' style='color:red;cursor:pointer'><i class='fa fa-close'></i></a></td>";
    								echo "<p>".$time_sent."</p>";
    								echo' </li>';
    								echo ' </div>';
    								echo '</ol>';   
                                }
								

							}
							
							
						}

					?>
						
					</table >
					
                        </div>
					</div>
					
				</div>
				<br>
				<form >
					<div class="row">
						<div class=" col-sm-12 form-group">
							<br>
						<input style="width:90%;" name="message" id="msg" class=" textarea form-comtrol" type="text" placeholder="Type here!" / >
						<button type="submit"  class=" btn btn-success btn-fill" id="form_submit"  value="send"><i class="fa fa-paper-plane "></i></button>	
						
					</div>
					</div>
					</form>
    </div>


</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
     <script>
    $(document).ready(function(){
        $('#form_submit').click(function(){
            $.post("students_chat_send.php",
            {message: $('#msg').val()},
            function(data){
                $('#room').html(data);


            })


        })


    });
    </script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/paper-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>

</html>