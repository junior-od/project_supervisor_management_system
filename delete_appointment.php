<?php 
include 'db_connect.php';
	session_start();
	$user_name= $_SESSION['userName'];
	function test_input($data){
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		$data=trim($data);
		return $data;
	}
	
	$id= $_SESSION['appoint'];
	$user_name=$_SESSION['userName'];
	$message=test_input($_GET['message']);
    $supervisor_name=$_SESSION['supervisor_name'];
    $query_info=$connect->query("SELECT student_name FROM appointment_$user_name WHERE id='".$id."'");
    $query_info_fetch=$query_info->fetchAll();
    foreach ($query_info_fetch as $info) {
    	
    	echo $name=$info['student_name'];
    	
    }
	
	$matric= $_SESSION['appoint_matric'];
	 if (empty($message)){
	 	header("location:supervisor_home_page.php");
	 }
	 else{
	 	 $delete_appointment=$connect->exec("DELETE FROM appointment_$user_name WHERE id='".$id."'");

	 	 $send = $connect->prepare("INSERT INTO message_$user_name(sender,receiver,message)
	 	 							VALUES(:sender,:receiver,:message)");
	 	 $send->execute(array(':sender' => $supervisor_name,':receiver' => $name,':message' => $message));
	 	// $send_message=$connect->prepare("INSERT INTO message_$matric(supervisor_name,message)
	 	// 								VALUES(:sup,:message)");
	 	// $send_message->execute(array(':sup' => $supervisor_name,':message' => $message));


		header("location:supervisor_home_page.php");
	}

	
?>