<?php 
include 'db_connect.php';
	session_start();
	$user_name=$_SESSION['supervisor_user_name'];

	$id= $_GET['id'];

	$delete_appointment=$connect->exec("DELETE FROM appointment_$user_name WHERE id='".$id."'");
	if($delete_appointment){
		header("location:students_my_appointment.php");
	}
?>