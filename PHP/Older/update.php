<form action="process-update.php" method="post">
Update the product price by Using the product_Name
</br>
</br>
<label>Product</label>
<?php
include 'connect.php';
$conn = OpenCon();
$result = $conn->query("select Product_ID, Name from products");
echo "<select name='Product_ID'>";
while ($row = $result->fetch_assoc()) {
unset($Product_ID, $Name);
$Product_ID = $row['Product_ID'];
$Name = $row['Name']; 
echo '<option value="'.$Product_ID.'">'.$Name.'</option>';
}
echo "</select>";
?>
<br>
</br>
<label>New Price </label>
<input name="Price" type="text" placeholder="Enter new price">
<br>
<br>
<input type="submit" value="Search">
</form>