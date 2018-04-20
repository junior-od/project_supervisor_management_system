<?php 
include 'db_connect.php';
	session_start();
	$user_name= $_SESSION['userName'];

	
	$id= $_SESSION['appoint'];
	$message=$_GET['message'];
    $supervisor_name=$_SESSION['supervisor_name'];

	
	$matric= $_SESSION['appoint_matric'];
	 if (empty($message)){
	 	header("location:supervisor_home_page.php");
	 }
	 else{
	 	$delete_appointment=$connect->exec("DELETE FROM appointment_$user_name WHERE id='".$id."'");

	 	$send_message=$connect->prepare("INSERT INTO message_$matric(supervisor_name,message)
	 									VALUES(:sup,:message)");
	 	$send_message->execute(array(':sup' => $supervisor_name,':message' => $message));


		header("location:supervisor_home_page.php");
	}

	
?>