<?php 
    include('db_connect.php');
?>


<!DOCTYPE html>
<html>
<head>
<title>Supervisor Appointment Management System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


</head>
<body class="body">

<div class="modal " id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_styles" role="document">
       <div class="modal-content" data-image>
          
             <div class="modal-body modal_style" >
             	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
             	<h5 class="modal-title sign_up_as_title" id="exampleModalLabel">SIGN UP AS </h5>
                
             	<ul class="sign_up_as">
             		<li class="sign_up_as_list"><button class="btn sign_up_as_button" onclick="window.location.href='supervisor_sign_up.php'">SUPERVISOR</button></li>
             		<li class="sign_up_as_list"><button class="btn sign_up_as_button" onclick="window.location.href='student_sign_up.php'">STUDENT</button></li>
             	</ul>
              
                  
            </div>
        </div>
    </div>
</div>


<nav class="navbar navbars navbar-expand-lg   fixed-top">
	<ul class="index_list">
		<li class="index_list_style"><a class="navbar-brand" href=" " >SUPERVISOR</a></li>
		<li class="index_list_style"><button class="btn sign_up_button" id="mySignUpButton">Sign Up</button></li>
	</ul>


</nav>
<br>
<br>
<br>


<div class="modal " id="login_supervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_styles" role="document">
       <div class="modal-content" data-image>
           
             <div class="modal-body modal_style" >
             	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
             	<h5 class="modal-title sign_up_as_title" id="exampleModalLabel">SUPERVISOR LOG IN </h5>
                
             	<form method="post" class="login_form_pos" >
             		<label class="login_text">User Name</label><br>
	             	<input type="text" class="login_input_box"><br>
	             	<label class="login_text">Password</label><br>
	             	<input type="password" class="login_input_box"><br>
	             	<br>
	             	<input type="submit" class="login_submit" name="supervisor_login" value="LOG IN">

             	</form>
             	
             	
                  
            </div>
        </div>
    </div>
</div>

<div class="modal " id="login_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_styles" role="document">
       <div class="modal-content" data-image>
           
             <div class="modal-body modal_style" >
             	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
             	<h5 class="modal-title sign_up_as_title" id="exampleModalLabel">STUDENT LOG IN </h5>
         
             	<form method="post" class="login_form_pos">
             		<label class="login_text">Matric Number</label><br>
	             	<input type="text" class="login_input_box"><br>
	             	<label class="login_text">Password</label><br>
	             	<input type="password" class="login_input_box"><br>
	             	<br>
	             	<input type="submit" class="login_submit" name="student_login" value="LOG IN">
             	</form>
             	
                  
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 ">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	


	<ul class="log_in_as">
		<h4 class="log_in_as_title">LOG IN AS</h4>
        <li class="log_in_as_list"><button class="btn log_in_as_button" id="log_in_supervisor_button">SUPERVISOR</button></li>
        <li class="log_in_as_list"><button class="btn log_in_as_button" id="log_in_student_button">STUDENT</button></li>
    </ul>
</div>
























<nav class="navbar navbars navbar-expand-lg  fixed-bottom ">
	<p class="copyright">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y'); ?> .All Rights Reserved</p>
</nav>
<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/modal.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>