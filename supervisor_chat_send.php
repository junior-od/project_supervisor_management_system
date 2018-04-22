<?php 
	include("db_connect.php");
	session_start();

	$receiver= $_SESSION['sender'];
	$user_name= $_SESSION['userName'];
    $full_name=$_SESSION['supervisor_name'];
    function test_input($data){
 		$data= trim($data);
 		$data=htmlspecialchars($data);
 		$data=stripcslashes($data);
 		return $data;
 	}
 	$message=test_input($_GET['message']);

   if (empty($_GET['message'])){
   	 header("location:supervisor_messages.php");
   }
   else{
   	$insert_message=$connect->prepare("INSERT INTO message_$user_name(sender,receiver,message)
														VALUES(:sender,:receiver,:message)");
	$insert_message->execute(array(':sender'=> $full_name,':receiver' => $receiver,':message' => $message ));
   	header("location:supervisor_messages.php");

   }
?>