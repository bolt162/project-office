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

	$result = mysqli_query($conn,"SELECT DEPARTMENT.dname, COUNT(*) FROM DEPARTMENT INNER JOIN EMPLOYEE ON EMPLOYEE.department_num = DEPARTMENT.d_num GROUP BY DEPARTMENT.d_num, DEPARTMENT.dname ORDER BY COUNT(*) DESC");

	if (!$result) 
	{
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}

	echo "<table border='1'>
	<tr>
	<th>Department Name</th>
	<th>No. of Employees</th>

	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['dname'] . "</td>";
		echo "<td>" . $row['COUNT(*)'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	mysqli_close($conn);

?>

