<?php

	$servername = "localhost";
	$username = "root";
	$password = null;
	$dbname = "project1_kartikey_sahil";
	header('Content-type: text/plain');
	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error)
	{
		die("Connection error ".$conn->connect_error);
	}

	$employee = "CREATE TABLE EMPLOYEE (fname VARCHAR(40), minit CHAR(1), lname VARCHAR(40), ssn VARCHAR(9), birth VARCHAR(40), address VARCHAR(40), gender CHAR(1), salary INT, super_ssn VARCHAR(9), department_num INT)";

	$department = "CREATE TABLE DEPARTMENT (dname VARCHAR(40), d_num INT, mgr_ssn VARCHAR(9), mgr_start_date VARCHAR(40))";

	$dept_location = "CREATE TABLE DEPT_LOCATIONS (dnumber INT, d_location VARCHAR(40))";

	$project = "CREATE TABLE PROJECT (pname VARCHAR(40), pnumber INT, plocation VARCHAR(40), dnum INT)";

	$works_on = "CREATE TABLE WORKS_ON (essn VARCHAR(9), pno INT, hours DOUBLE)";

	if($conn->query($employee))
	{
		echo("Table employee created successfully\n");
	}

	if($conn->query($department))
	{
		echo("Table department created successfully\n");
	}

	if($conn->query($dept_location))
	{
		echo("Table dept_location created successfully\n");
	}

	if($conn->query($project))
	{
		echo("Table project created successfully\n");
	}

	if($conn->query($works_on))
	{
		echo("Table works_on created successfully\n");
	}

	mysqli_close($conn);
?>
