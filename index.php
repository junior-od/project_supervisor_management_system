<?php 
    include('db_connect.php');
    session_start();

   $error_empty_message="";
   $error_invalid_message="";
   //sanitize inputs
   function test_input($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;

   }

    if(isset($_POST['supervisor_login'])){
       
        if(!empty($_POST['supervisor_user_name']) && !empty($_POST['supervisor_password'])){
            $user_name=$_POST['supervisor_user_name'];
            $password=md5($_POST['supervisor_password']);
            $query_username_password=$connect->query("SELECT * FROM supervisor_management_system.supervisors WHERE (userName='".$user_name."' AND password='".$password."')");
            $username_password_count=count($query_username_password->fetchALL());
            if ($username_password_count > 0){
                //session global variables to get user attributes
                $get_user=$connect->prepare("SELECT id,supervisor_name,userName,email FROM supervisor_management_system.supervisors WHERE (userName=:user AND password=:password)");
                $get_user->execute(array(':user' => $user_name,':password' => $password));

                foreach($get_user as $row){
                    $_SESSION['id']=$row['id'];
                    $_SESSION['supervisor_name']=$row['supervisor_name'];
                    $_SESSION['userName']=$row['userName'];
                    $_SESSION['email']=$row['email'];
                }




                 header("location:supervisor_home_page.php");
            }
            else{
            $error_invalid_message="<div class='alert alert-danger' role='alert'>
                  SUPERVISOR LOGIN ERROR MESSAGE: invalid user name or password
                    </div>";

                }
           

        }
        else{
             $error_empty_message="<div class='alert alert-danger' role='alert'>
                  SUPERVISOR LOGIN ERROR MESSAGE: enter username or password
                    </div>";

        }

        
    }






    if(isset($_POST['student_login'])){
        if(!empty($_POST['matric_number']) && !empty($_POST['student_password'])){
            $matric_number=$_POST['matric_number'];
            $student_password=md5($_POST['student_password']);
            $query_matric_password=$connect->query("SELECT * FROM supervisor_management_system.students WHERE (matricNo='".$matric_number."' AND password='".$student_password."')");
            $matric_password=count($query_matric_password->fetchALL());
            if ($matric_password > 0 ){
                //session global variables to get user attributes
                $get_student=$connect->prepare("SELECT id,fullName,matricNo,supervisor_user_name,email,profile_picture FROM supervisor_management_system.students WHERE (matricNo=:matric AND password=:password)");
                $get_student->execute(array(':matric' => $matric_number,':password' => $student_password));

                foreach($get_student as $rows){
                    $_SESSION['id']=$rows['id'];
                    $_SESSION['fullName']=$rows['fullName'];
                    $_SESSION['matricNo']=$rows['matricNo'];
                    $_SESSION['supervisor_user_name']=$rows['supervisor_user_name'];
                    $_SESSION['email']=$rows['email'];
                    $_SESSION['profile_picture']=$rows['profile_picture'];
                }

                $query_supervisor_name=$connect->prepare("SELECT supervisor_name FROM supervisor_management_system.supervisors WHERE userName=:user_name");
                $query_supervisor_name->execute(array(':user_name' => $_SESSION['supervisor_user_name']));
                foreach($query_supervisor_name as $i){
                    $_SESSION['supervisor_full_name']=$i['supervisor_name'];
                }

               
            
                 header("location:students_home_page.php");




            }
            else{
                $error_invalid_message="<div class='alert alert-danger' role='alert'>
                  STUDENT LOGIN ERROR MESSAGE: invalid user name or password
                    </div>";

            }


        }
        else{
            $error_empty_message="<div class='alert alert-danger' role='alert'>
                  STUDENT LOGIN ERROR MESSAGE: enter username or password
                    </div>";

        }
        //header("location:supervisor_dashboard.php");
    }
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

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">User Signup</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
                        <div class="row">
             	<ul class="sign_up_as col-xs-12">
                   <div class="row">
           		<li class="sign_up_as_list col-md-6"><button class="btn sign_up_as_button" onclick="window.location.href='supervisor_sign_up.php'">SUPERVISOR</button></li>
                    <li class="sign_up_as_list col-md-6"><button class="btn sign_up_as_button" onclick="window.location.href='student_sign_up.php'">STUDENT</button></li>
               </div>
           	</ul>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">SUPERVISOR MANAGEMENT SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
     
      </li>
      <li class="nav-item">
    
      </li>
      <li class="nav-item">
      
      </li>
    </ul>
    <span class="navbar-text">
    <button class=" btn sign_up_button" id="mySignUpButton">Sign Up</button>
    </span>
  </div>
</nav>
<br>
<br>
<br>

<div class="modal fade" id="login_supervisor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Supervisor Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
             	<h5 class="modal-title sign_up_as_title" id="exampleModalLabel">SUPERVISOR LOG IN </h5>
                
                 <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
                 <div class="form-group">
             		<label class="login_text">User Name:</label>
                     <input  class="form-control"type="text" name="supervisor_user_name" class="login_input_box"><br>
                </div>
                <div class="form-group">
	             	<label class="login_text">Password:</label>
	             	<input class="form-control" type="password" name="supervisor_password" class="login_input_box"><br>
                </div>
                     <input type="submit" class="btn btn-primary" name="supervisor_login" value="LOG IN">
                
             	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="login_student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered role="document">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">STUDENT Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
                 <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                 <div class="form-group">
             		<label class="login_text">Matric Number:</label>
                     <input type="text" name="matric_number" class="form-control">
                </div>
                <div class="form-group">
	             	<label class="login_text">Password:</label>
	             	<input type="password" name="student_password" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="student_login" value="LOG IN">
             	</form>
             	
                   <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

            </div>
        </div>
    </div>
</div>
<div class="col-md-6 ">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <?php
    if($error_empty_message || $error_invalid_message){
echo $error_empty_message.$error_invalid_message;
    }
?>
	
</div>
<div class="col-md-12">
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