<?php
include 'connect.php';
$conn = OpenCon();
$SUPPLIER_ID = $_POST['sID'];
$sql = "SELECT SUPPLIER_ID, MANAGER_ID, ADDRESS, CONTACT_NUMBER, EMAIL FROM OAR_SUPPLIER WHERE SUPPLIER_ID = '$SUPPLIER_ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>SUPPLIER_ID</th>
	<th class='border-class'>MANAGER_ID</th>
	<th class='border-class'>ADDRESS</th>
	<th class='border-class'>CONTACT_NUMBER</th>
	<th class='border-class'>EMAIL</th></tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["SUPPLIER_ID"]."</td>
		<td class='border-class'>".$row["MANAGER_ID"]."</td>
		<td class='border-class'>".$row["ADDRESS"]."</td>
		<td class='border-class'>".$row["CONTACT_NUMBER"]."</td>
		<td class='border-class'>".$row["EMAIL"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>