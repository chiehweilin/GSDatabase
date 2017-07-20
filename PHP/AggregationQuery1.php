<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT SUM(MONTHLY_REVENUE)
FROM department";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>SUM(MONTHLY_REVENUE)</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["SUM(MONTHLY_REVENUE)"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>