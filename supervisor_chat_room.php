<?php 
	include("db_connect.php");
	session_start();
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

<?php 
	

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
<link href="css/style.css" rel="stylesheet">

     <link href="css/jquery.dm-uploader.min.css" rel="stylesheet">
     <style>
            #btn-close-modal {
                width:100%;
                text-align: center;
               
                
            }

            .cl{
                color:#fff;
                 text-align: center;
                cursor:pointer;


            }

            .up{
                width:100%;
                text-align: center;

            }
            .upload_button{

                text-align: center;
                cursor:pointer;
               

            }

        </style>
</head>
<body>	
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    	<div class="sidebar-wrapper">
            <div class="logo">
                    <h3 class="simple-text"><?php echo $_SESSION['userName']; ?></h3>
            </div>

            <ul class="nav">
                <li >
                    <a href="supervisor_home_page.php">
                        <i class="ti-list"></i>
                        <p>Appointment List</p>
                    </a>
                </li>
                <li>
                    <a href="supervisor_dashboard.php">
                        <i class="ti-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="active">
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
				<a class="card" href="supervisor_messages.php"> <div class=" author"><i class="fa fa-chevron-left"></i> <img class="avatar border-white"src="profile_picture/default.jpg" draggable="false"/><?php echo $_SESSION['sender']; ?></div></a>
				<br>
                    <div class="col-md-12"style=" overflow-y:auto;height:50vh; ">
                        <div class="card" style="background-image:url('images/bg1.png');">
                            <div class="content  table-responsive table-full-width" >
    						<table class="table " id="room">
							<?php
					     $query_history=$connect->query("SELECT id,sender,message,time_sent,receiver_delete,sender_delete FROM message_$user_name WHERE (sender='".$full_name."' AND receiver='".$sender."') OR (sender='".$sender."' AND receiver='".$full_name."') ORDER BY time_sent DESC");
						$query_history_fetch=$query_history->fetchAll();
						foreach ($query_history_fetch as $fet) {
							$time=strtotime($fet['time_sent']);
							 $time_sent=date("d-m-Y H:i",$time);
							if($fet['sender'] == $sender){
                                if ($fet['receiver_delete'] == 0){
                                    $message_delete_id=$fet['id'];
    								echo ' <ol class="chat">';
    								echo' <li class="other">';
    								echo ' <div class="msg">';
                                   //receiver  on the left side
                                

                               
								echo '<div style="color:orange;" >'.$fet['sender']."</div>"."</td>"."<br>";
								echo $fet['message']."</td><a href='supervisor_delete_message.php?id=$message_delete_id' class='del' style='color:red;cursor:pointer'><i class='fa fa-close'></i></a>";
								echo "<p>".$time_sent."</p>";
								echo' </li>';
								echo ' </div>';
                                 }
							}
							else{
                                if ($fet['sender_delete'] == 0){
                                    $message_delete_id=$fet['id'];
    								echo ' <ol class="chat">';
    								echo' <li class="self">';
    								echo ' <div class="msg">';
                                 //sender  on the right side
    								echo '<div style="color:red;">'. $fet['sender']."</div>"."</td>"."<br>";
    								echo $fet['message']."<a href='supervisor_delete_message_2.php?id=$message_delete_id' class='del' style='color:red;cursor:pointer'><i class='fa fa-close'></i></a></td>";
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
				<form method="post">
					<div class="row">
						<div class=" col-sm-12 form-group">
							<br>
                        <div class="dropdown">
                            <span  class="dropdown-toggle" style="color:#008080;cursor:pointer" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i></span>
                            <div class="dropdown-menu">
                              <a id="demo01" href="#animatedModal" class="dropdown-item" >Image</a>
                              <div class="dropdown-divider"></div>
                              <p class="dropdown-item" >Video</p>
                              <div class="dropdown-divider"></div>
                              <p class="dropdown-item">Document</p>
                            </div>
                        </div>
						<input style="width:90%;" id="msg" name="message" class=" textarea form-comtrol" type="text" placeholder="Type here!" / >
						<button type="submit"  class=" btn btn-success btn-fill" id="form_submit"  value="send"><i class="fa fa-paper-plane "></i></button>	
						
					</div>
					</div>
					</form>
    </div>
     




</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>

   
    <script>
    $(document).ready(function(){
         
        $('#form_submit').click(function(){
            $.post("supervisor_chat_send.php",
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