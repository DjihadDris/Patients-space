<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$dob = $_COOKIE['dob'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];

$sqls = "SELECT * FROM appointments WHERE date='$date' AND time='$time' AND mp='$doctor'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
  while($row = $results->fetch_assoc()) {
  $error = "Il y a un rendez-vous pris pour cette heure";
  echo json_encode(array("statusCode"=>201, "message"=>$error));
  }}else{

$sql = "INSERT INTO appointments (date, time, mp, namepatient, fnpatient, dob, valid, observation, price, pay, remain)
VALUES ('$date', '$time', '$doctor', '$name', '$fn', '$dob', '', '-', '-', '-', '-')";

if ($conn->query($sql) === TRUE) {
  $success = "Le rendez-vous a été pris avec succès";
  echo json_encode(array("statusCode"=>200, "message"=>$success));
} else {
  $error = "Le rendez-vous n'a pas été pris";
  echo json_encode(array("statusCode"=>201, "message"=>$error));
}
  }

$conn->close();

?>