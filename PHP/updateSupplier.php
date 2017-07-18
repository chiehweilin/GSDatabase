<form action="processUpdateSupplier.php" method="post">
Update the customer information by using the Supplier ID
</br>
</br>

<label>Supplier ID</label>

<?php
include 'connect.php';
$conn = OpenCon();
$result = $conn->query("SELECT Supplier_ID FROM OAR_Supplier");

echo "<select name='sID'>";
while ($row = $result->fetch_assoc()) {
    unset($Supplier_ID);
    $Supplier_ID = $row['Supplier_ID']; 
    echo '<option value="'.$Supplier_ID.'">'.$Supplier_ID.'</option>';
}
echo "</select>";
?>

</br>
<label>Data field to be changed</label>
</br>
</br>
<select name='datafield'>
    <option value='Supplier_ID'>Supplier ID</option>
    <option value='Manager_ID'>Manager ID</option>
    <option value='Address'>Address</option>
    <option value='Contact_Number'>Contact Number</option>
    <option value='Email'>Email</option>
</select>
<br>
<br>
</br>

<label>New value </label>
<input name="tmp" type="text" placeholder="Enter new value">
<br>
<br>
<input type="submit" value="Update">
</form>