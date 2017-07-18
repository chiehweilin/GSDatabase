<?php
include 'connect.php';
$conn = OpenCon();
$EMPLOYEE_ID = $_POST['eID'];
$sql = "SELECT EMPLOYEE_ID, SIN, ADDRESS, CONTACT_NUMBER, EMERGENCY_CONTACT, SALARY, AUTHORITY FROM EMPLOYEES WHERE EMPLOYEE_ID = '$EMPLOYEE_ID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>EMPLOYEE_ID</th>
	<th class='border-class'>SIN</th>
	<th class='border-class'>ADDRESS</th>
	<th class='border-class'>CONTACT_NUMBER</th>
	<th class='border-class'>EMERGENCY_CONTACT</th>
	<th class='border-class'>SALARY</th>
	<th class='border-class'>AUTHORITY</th></tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["EMPLOYEE_ID"]."</td>
		<td class='border-class'>".$row["SIN"]."</td>
		<td class='border-class'>".$row["ADDRESS"]."</td>
		<td class='border-class'>".$row["CONTACT_NUMBER"]."</td>
		<td class='border-class'>".$row["EMERGENCY_CONTACT"]."</td>
		<td class='border-class'>".$row["SALARY"]."</td>
		<td class='border-class'>".$row["AUTHORITY"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>