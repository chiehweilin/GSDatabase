<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT Product_ID, Supplier_ID, Expiration_Date, Produced_Date, Weight, Price, Name FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>Product_ID</th>
	<th class='border-class'>Supplier_ID</th>
	<th class='border-class'>Expiration_Date</th>
	<th class='border-class'>Produced_Date</th>
	<th class='border-class'>Weight</th>
	<th class='border-class'>Price</th>
	<th class='border-class'>Name</th></tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["Product_ID"]."</td>
		<td class='border-class'>".$row["Supplier_ID"]."</td>
		<td class='border-class'>".$row["Expiration_Date"]."</td>
		<td class='border-class'>".$row["Produced_Date"]."</td>
		<td class='border-class'>".$row["Weight"]."</td>
		<td class='border-class'>".$row["Price"]."</td>
		<td class='border-class'>".$row["Name"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>