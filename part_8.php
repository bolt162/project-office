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

	$result = mysqli_query($conn,"SELECT fname, lname, COUNT(*) FROM EMPLOYEE WHERE super_ssn != 'NULL' AND super_ssn IN (SELECT ssn FROM EMPLOYEE) GROUP BY super_ssn ORDER BY COUNT(*) DESC");

	if (!$result) 
	{
	    printf("Error: %s\n", mysqli_error($conn));
	    exit();
	}

	echo "<table border='1'>
	<tr>
	<th>Supervisor First Name</th>
	<th>Supervisor Last Name</th>
	<th>Employees Supervised</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['COUNT(*)'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	mysqli_close($conn);

?>

