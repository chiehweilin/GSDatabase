<?php
include 'connect.php';
$conn = OpenCon();
$PRODUCT_ID = $_POST['PRODUCT_ID'];
$sql = "SELECT CUSTOMER.NAME, includeproducts_receipt.PRODUCT_ID
FROM customer, includeproducts_receipt
WHERE CUSTOMER.CUSTOMER_ID = includeproducts_receipt.CUSTOMER_ID
GROUP BY NAME, includeproducts_receipt.PRODUCT_ID
HAVING includeproducts_receipt.PRODUCT_ID <> '$PRODUCT_ID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>NAME</th>
	<th class='border-class'>PRODUCT_ID</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["NAME"]."</td>
		<td class='border-class'>".$row["PRODUCT_ID"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>