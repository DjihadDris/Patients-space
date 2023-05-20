[
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$dob = $_COOKIE['dob'];
$i = 1;

$sql = "SELECT * FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND del<>'yes'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

      $sqlo = "SELECT ID FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND del<>'yes' ORDER BY ID DESC LIMIT 1";
        $resulto = $conn->query($sqlo);
  if ($resulto->num_rows > 0) {
    while($rowo = $resulto->fetch_assoc()) {   
      if("$row[ID]" == "$rowo[ID]"){   
?>
["<?php echo "$row[ID]"; ?>", "<?php echo $i;$i++; ?>", "<?php if("$row[valid]" == "yes"){echo "<i class='check icon green'></i>";}else{echo "<i class='close icon red'></i>";} ?>", "<?php echo "$row[mp]"; ?>", "<?php echo "$row[date]"; ?>", "<?php echo "$row[time]"; ?>", "<?php echo "$row[observation]"; ?>", "<?php if("$row[price]" == "-"){echo "-";}else{echo number_format("$row[price]", 2)." DA";} ?>", "<?php if("$row[pay]" == "-"){echo "-";}else{echo number_format("$row[pay]", 2)." DA";} ?>", "<?php if("$row[remain]" == "-"){echo "-";}else{echo number_format("$row[remain]", 2)." DA";} ?>", "<?php if("$row[valid]" <> "yes"){ ?><button class='ui button negative del'><i class='close icon'></i> Annuler</button><?php } ?>"]
<?php
}else{
?>
["<?php echo "$row[ID]"; ?>", "<?php echo $i;$i++; ?>", "<?php if("$row[valid]" == "yes"){echo "<i class='check icon green'></i>";}else{echo "<i class='close icon red'></i>";} ?>", "<?php echo "$row[mp]"; ?>", "<?php echo "$row[date]"; ?>", "<?php echo "$row[time]"; ?>", "<?php echo "$row[observation]"; ?>", "<?php if("$row[price]" == "-"){echo "-";}else{echo number_format("$row[price]", 2)." DA";} ?>", "<?php if("$row[pay]" == "-"){echo "-";}else{echo number_format("$row[pay]", 2)." DA";} ?>", "<?php if("$row[remain]" == "-"){echo "-";}else{echo number_format("$row[remain]", 2)." DA";} ?>", "<?php if("$row[valid]" <> "yes"){ ?><button class='ui button negative del'><i class='close icon'></i> Annuler</button><?php } ?>"],
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