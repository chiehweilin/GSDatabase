<form action="processUpdateCustomer.php" method="post">

Update the customer information by using the Customer ID
</br>
</br>

<label>Customer ID</label>

<?php
include 'connect.php';
$conn = OpenCon();
$result = $conn->query("SELECT Customer_ID, Name FROM Customer");

echo "<select name='cID'>";
while ($row = $result->fetch_assoc()) {
    unset($Customer_ID, $Name);
    $Customer_ID = $row['Customer_ID']; 
    $Name = $row['Name'];
    echo '<option value="'.$Customer_ID.'">'.$Name.'</option>';
}
echo "</select>";
?>

</br>
<label>Data field to be changed</label>
</br>
</br>
<select name='datafield'>
    <option value='Customer_ID'>Customer ID</option>
    <option value='Name'>Name</option>
    <option value='Address'>Address</option>
    <option value='Phone_Number'>Phone Number</option>
    <option value='Email'>Email</option>
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