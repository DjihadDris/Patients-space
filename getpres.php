<?php
include('db.php');

$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$date = $_POST['date'];

$sql = "SELECT * FROM prescriptions WHERE namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND date='$date'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<?php echo "$row[details]"; ?>
<?php
}}else{
echo "";
}
?>