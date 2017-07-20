<?php
include 'connect.php';
$conn = OpenCon();
$Price = $_POST['price'];
$sql = "SELECT * FROM products WHERE PRICE >= '$Price' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>PRODUCT_ID</th>
	<th class='border-class'>EXPIRATION_DATE</th>
	<th class='border-class'>PRODUCED_DATE</th>
	<th class='border-class'>WEIGHT</th>
	<th class='border-class'>PRICE</th>
	<th class='border-class'>NAME</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["PRODUCT_ID"]."</td>
		<td class='border-class'>".$row["EXPIRATION_DATE"]."</td>
		<td class='border-class'>".$row["PRODUCED_DATE"]."</td>
		<td class='border-class'>".$row["WEIGHT"]."</td>
		<td class='border-class'>".$row["PRICE"]."</td>
		<td class='border-class'>".$row["NAME"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>