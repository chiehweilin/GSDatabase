<?php
include 'connect.php';
$conn = OpenCon();
$sql = "SELECT MANAGER.MANAGER_ID
FROM manager
WHERE NOT EXISTS
(
	SELECT products.PRODUCT_ID
    FROM PRODUCTS
    WHERE NOT EXISTS
    (
        SELECT supply.PRODUCT_ID
        FROM supply,oar_supplier
        WHERE supply.SUPPLIER_ID = oar_supplier.SUPPLIER_ID 
        AND oar_supplier.MANAGER_ID = manager.MANAGER_ID
		AND supply.PRODUCT_ID = products.PRODUCT_ID
    )
 )";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo "<table><tr>
	<th class='border-class'>MANAGER_ID</th>
	</tr>";
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>
		<td class='border-class'>".$row["MANAGER_ID"]."</td>
		</tr>";
		}
		    echo "</table>";
		} 
		else {
			echo "0 results";
		}
		CloseCon($conn);
?>