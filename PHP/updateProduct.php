<form action="processUpdateProduct.php" method="post">

Update the product information by using the Product ID
</br>
</br>

<label>Product ID</label>

<?php
include 'connect.php';
$conn = OpenCon();
$result = $conn->query("SELECT Product, Name FROM Products");

echo "<select name='pID'>";
while ($row = $result->fetch_assoc()) {
    unset($Product_ID, $Name);
    $Product_ID = $row['Product_ID'];
    $Name = $row['Name']; 
    echo '<option value="'.$Product_ID.'">'.$Name.'</option>';
}
echo "</select>";
?>

</br>
<label>Data field to be changed</label>
</br>
</br>
<select name='datafield'>
    <option value='Product_ID'>Product ID</option>
    <option value='Name'>Name</option>
    <option value='Price'>Price</option>
    <option value='Weight'>Weight</option>
    <option value='Produced_Date'>Produced Date</option>
    <option value='Expiration_Date'>Expiration Date</option>
</select>
<br>
<br>
</br>

<label>New value</label>
<input name="new" type="text" placeholder="Enter new value">
<br>
<br>
<input type="submit" value="Update">
</form>