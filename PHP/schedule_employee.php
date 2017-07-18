<?php
include 'connect.php';
$conn = OpenCon();
$EMPLOYEE_ID = $_POST['eID'];
$sql = "SELECT SCHEDULE_ID, EMPLOYEE_ID, DAY, TIME_IN, TIME_OUT, WORKING_HOUR FROM EMPLOYEE_SCHEDULE WHERE EMPLOYEE_ID = '$EMPLOYEE_ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>SCHEDULE_ID</th>
	<th class='border-class'>EMPLOYEE_ID</th>
	<th class='border-class'>DAY</th>
	<th class='border-class'>TIME_IN</th>
	<th class='border-class'>TIME_OUT</th>
	<th class='border-class'>WORKING_HOUR</th></tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["SCHEDULE_ID"]."</td>
		<td class='border-class'>".$row["EMPLOYEE_ID"]."</td>
		<td class='border-class'>".$row["DAY"]."</td>
		<td class='border-class'>".$row["TIME_IN"]."</td>
		<td class='border-class'>".$row["TIME_OUT"]."</td>
		<td class='border-class'>".$row["WORKING_HOUR"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>