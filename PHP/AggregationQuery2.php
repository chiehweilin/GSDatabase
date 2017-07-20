<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT	department.DEPARTMENT_NUMBER, MIN(department.MONTHLY_SALES -department.MONTHLY_REVENUE) AS profit
FROM department;
";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>DEPARTMENT_NUMBER</th>
	<th class='border-class'>profit</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["DEPARTMENT_NUMBER"]."</td>
		<td class='border-class'>".$row["profit"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>