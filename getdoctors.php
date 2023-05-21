<option value="">--Sélectionner--</option>
<?php
include('db.php');

$wilaya = $_POST['wilaya'];
$specialty = $_POST['specialty'];

$sql = "SELECT * FROM admins WHERE job<>'Infirmier' AND job<>'Admin' AND wilaya='$wilaya' AND description='$specialty' AND del=''";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<option value="<?php echo "$row[name]"; ?>"><?php echo "$row[fn] $row[name] ($row[job])"; ?></option>
<?php
}}
?>