<?php
	
	$servername = "localhost";
	$username = "root";
	$password = null;
	$dbname = "project1_kartikey_sahil";

	$conn = new mysqli($servername, $username, $password, $dbname);

	mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);
	if($conn->connect_error)
	{
		die("Connection error: " . $conn->connect_error);
	}


	$employee = "LOAD DATA LOCAL INFILE '~/downloads/EntryFiles/EMPLOYEE.txt' INTO TABLE EMPLOYEE FIELDS TERMINATED BY ', ' ENCLOSED BY '\'' LINES TERMINATED BY '\r\n';";

	$project = "LOAD DATA LOCAL INFILE '~/downloads/EntryFiles/PROJECT.txt' INTO TABLE PROJECT FIELDS TERMINATED BY ', ' ENCLOSED BY '\'' LINES TERMINATED BY '\r\n';";

	$works_on = "LOAD DATA LOCAL INFILE '~/downloads/EntryFiles/WORKS_ON.txt' INTO TABLE WORKS_ON FIELDS TERMINATED BY ', ' ENCLOSED BY '\'' LINES TERMINATED BY '\r\n';";

	$dept_location = "LOAD DATA LOCAL INFILE '~/downloads/EntryFiles/DEPT_LOCATIONS.txt' INTO TABLE DEPT_LOCATIONS FIELDS TERMINATED BY ', ' ENCLOSED BY '\'' LINES TERMINATED BY '\r\n';";

	$department = "LOAD DATA LOCAL INFILE '~/downloads/EntryFiles/DEPARTMENT.txt' INTO TABLE DEPARTMENT FIELDS TERMINATED BY ', ' ENCLOSED BY '\'' LINES TERMINATED BY '\r\n';";

	mysqli_query($conn, $employee);
	if($conn->query($employee))
	{
		echo("Table employee loaded successfully\n");
	}

	if($conn->query("CREATE TABLE KAR"))
	{
		echo("created");
	}

	if($conn->query($department))
	{
		echo("Table department loaded successfully\n");
	}


	if($conn->query($dept_location))
	{
		echo("Table dept_location loaded successfully\n");
	}


	if($conn->query($project))
	{
		echo("Table project loaded successfully\n");
	}


	if($conn->query($works_on))
	{
		echo("Table works_on loaded successfully\n");
	}

	mysqli_close($conn);
?>