<?php 
//connect to database
	$serverName="localhost";
	$userName="root";
	$password="";
	

	try{
		$connect = new PDO("mysql:host=$serverName;dbname=supervisor_management_system",$userName,$password);
		//set pdo error mode exception
		$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "connected to database";
		//$sql_db="CREATE DATABASE supervisor_management_system";
		//$connect->exec($sql_db);//because no results are returned

		//echo"connection sucessful";
		//create database table
		// $sql_table1="CREATE TABLE supervisors(
		// 	id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 	fullName VARCHAR(60) NOT NULL,
		// 	userName VARCHAR(30) NOT NULL,
		// 	email VARCHAR(50) NOT NULL,
		// 	password VARCHAR(50) NOT NULL,
		// 	reg_date TIMESTAMP


		// 	)";
		// $connect->exec($sql_table1);
		// $sql_table2="CREATE TABLE students(
		// 	id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 	fullName VARCHAR(60) NOT NULL,
		// 	matricNo INT(10) NOT NULL,
		// 	email VARCHAR(50) NOT NULL,
		// 	profile_picture VARCHAR(50) NOT NULL,
		// 	password VARCHAR(50) NOT NULL,
		// 	reg_date TIMESTAMP 

		// 	)";
		// $connect->exec($sql_table2);
		//echo "table has benn created";


	}
	catch(PDOException $e){
		echo "<br>" . $e->getMessage();
	}
?>