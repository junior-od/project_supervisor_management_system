<?php
    session_start();
    $_SESSION['sender']= $_GET['sender'];
	header("location:students_chat_room.php");


?>