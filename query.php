<?php
	
	$servername = "localhost";
	$username = "root";
	$password = null;
	$dbname = "project1_kartikey_sahil";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error)
	{
		die("Connection error: " . $conn->connect_error);
	}

	if(isset($_POST["d_name"]))
	{

		$result = mysqli_query($conn,"SELECT EMPLOYEE.fname, EMPLOYEE.minit, EMPLOYEE.lname, EMPLOYEE.salary FROM EMPLOYEE, DEPARTMENT WHERE DEPARTMENT.dname = '".$_POST['d_name']."' AND EMPLOYEE.department_num = DEPARTMENT.d_num");

		if (!$result) 
		{
		    printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}

		echo "<table border='1'>
		<tr>
		<th>Firstname</th>
		<th>MiddleInitials</th>
		<th>Lastname</th>
		<th>Salary</th>

		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['fname'] . "</td>";
			echo "<td>" . $row['minit'] . "</td>";
			echo "<td>" . $row['lname'] . "</td>";
			echo "<td>" . $row['salary'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";

	}

	if(isset($_POST["fname"]))
	{
		$result = mysqli_query($conn,"SELECT PROJECT.pname, WORKS_ON.hours FROM PROJECT, WORKS_ON, EMPLOYEE WHERE EMPLOYEE.fname = '".$_POST['fname']."' AND EMPLOYEE.lname = '".$_POST['lname']."' AND WORKS_ON.essn = EMPLOYEE.ssn AND PROJECT.pnumber = WORKS_ON.pno");

		if (!$result) 
		{
		    printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}

		echo "<table border='1'>
		<tr>
		<th>ProjectName</th>
		<th>Hours</th>

		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['pname'] . "</td>";
			echo "<td>" . $row['hours'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";

	}

	if(isset($_POST["dname"]))
	{
		$result = mysqli_query($conn,"SELECT SUM(salary) FROM EMPLOYEE WHERE department_num IN (SELECT d_num FROM DEPARTMENT WHERE dname='".$_POST['dname']."')");

		if (!$result) 
		{
		    printf("Error: %s\n", mysqli_error($conn));
		    exit();
		}

		echo "<table border='1'>
		<tr>
		<th>Total Salary</th>

		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>" . $row['SUM(salary)'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";

	}

	mysqli_close($conn);

?>