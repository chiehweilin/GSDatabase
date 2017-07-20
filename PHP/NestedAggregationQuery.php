<?php

include 'connect.php';

$conn = OpenCon();


$sql = "SELECT CUSTOMER.CUSTOMER_ID, PRODUCTS.NAME, PRODUCTS.PRICE, (SUM(INCLUDEPRODUCTS_RECEIPT.PRODUCT_COUNT) * PRODUCTS.PRICE) AS TotalSpent
FROM CUSTOMER, INCLUDEPRODUCTS_RECEIPT, PRODUCTS
WHERE CUSTOMER.CUSTOMER_ID = INCLUDEPRODUCTS_RECEIPT.CUSTOMER_ID
AND INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID = PRODUCTS.PRODUCT_ID
GROUP BY CUSTOMER.CUSTOMER_ID
HAVING (SUM(INCLUDEPRODUCTS_RECEIPT.PRODUCT_COUNT) * PRODUCTS.PRICE) > 
(SELECT (SUM(INCLUDEPRODUCTS_RECEIPT.PRODUCT_COUNT) * PRODUCTS.PRICE) FROM INCLUDEPRODUCTS_RECEIPT, PRODUCTS WHERE INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID = PRODUCTS.PRODUCT_ID AND INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID = PRODUCTS.PRODUCT_ID);";


// $sql = "SELECT CUSTOMER.Name, SUM(Product_Count) FROM CUSTOMER, INCLUDEPRODUCTS_RECEIPT 
// WHERE CUSTOMER.Customer_ID = INCLUDEPRODUCTS_RECEIPT.Customer_ID GROUP BY CUSTOMER.Customer_ID"

// $sql = "SELECT CUSTOMER.NAME, INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID
// FROM CUSTOMER, INCLUDEPRODUCTS_RECEIPT
// WHERE CUSTOMER.CUSTOMER_ID = INCLUDEPRODUCTS_RECEIPT.CUSTOMER_ID
// GROUP BY NAME, INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID
// HAVING INCLUDEPRODUCTS_RECEIPT.PRODUCT_ID <> '100000'";

myTable($conn,$sql);

function myTable($obConn,$sql)
{
    $rsResult = mysqli_query($obConn, $sql) or
                die(mysqli_error($obConn));
    if(mysqli_num_rows($rsResult) > 0)
    {
        //We start with header. >>>Here we retrieve the field names<<<
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\" 
        		cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
        $i = 0;
        while ($i < mysqli_num_fields($rsResult)) {
            $field = mysqli_fetch_field_direct($rsResult, $i);
            $fieldName = $field -> name;
            echo "<td><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
        echo "</tr>";

        //>>>Field names retrieved<<<
        //We dump info
        $bolWhite = false;
        while ($row = mysqli_fetch_assoc($rsResult)) {
            echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr
            bgcolor=\"#FFF\">";
            $bolWhite = !$bolWhite;
            foreach($row as $data) {
                echo "<td>$data</td>";
            }
	        echo "</tr>";
        }

	    echo "</table>";
    }
    else {
        echo "No result";
    }
}

CloseCon($conn);

?>
