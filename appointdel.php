<?php
include('db.php');
$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$ID = $_POST['ID'];

$sql = "UPDATE appointments SET del='yes' WHERE ID='$ID'";

if ($conn->query($sql) === TRUE) {
  echo "200";
} else {
  echo "201";
}
?>