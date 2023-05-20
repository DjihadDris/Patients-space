[
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$dob = $_COOKIE['dob'];
$i = 1;

$sql = "SELECT * FROM prescriptions WHERE namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND del<>'yes'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

      $sqlo = "SELECT ID FROM prescriptions WHERE namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND del<>'yes' ORDER BY ID DESC LIMIT 1";
        $resulto = $conn->query($sqlo);
  if ($resulto->num_rows > 0) {
    while($rowo = $resulto->fetch_assoc()) {   
      if("$row[ID]" == "$rowo[ID]"){   
?>
["<?php echo "$row[ID]"; ?>", "<?php echo $i;$i++; ?>", "<?php echo "$row[mp]"; ?>", "<?php echo "$row[date]"; ?>", "<button class='ui button teal show'><i class='eye icon'></i> Afficher</button>"]
<?php
}else{
?>
["<?php echo "$row[ID]"; ?>", "<?php echo $i;$i++; ?>", "<?php echo "$row[mp]"; ?>", "<?php echo "$row[date]"; ?>", "<button class='ui button teal show'><i class='eye icon'></i> Afficher</button>"],
<?php
}
}}else{

}
}}else{
echo "";
}
mysqli_close($conn);
?>
]