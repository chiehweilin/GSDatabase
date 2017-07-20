<?php
include 'connect.php';
$conn = OpenCon();
$PRODUCT_ID = $_POST['PRODUCT_ID'];
$sql = "SELECT customer.NAME,customer.PHONE_NUMBER 
FROM customer 
RIGHT OUTER JOIN includeproducts_receipt
ON includeproducts_receipt.PRODUCT_ID = '$PRODUCT_ID' AND customer.CUSTOMER_ID = includeproducts_receipt.CUSTOMER_ID ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>NAME</th>
	<th class='border-class'>PHONE_NUMBER</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["NAME"]."</td>
		<td class='border-class'>".$row["PHONE_NUMBER"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>