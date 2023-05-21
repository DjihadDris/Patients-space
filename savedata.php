<?php
include('db.php');

$name = $_POST['name'];
$fn = $_POST['fn'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$pn = $_POST['pn'];
$gender = $_POST['gender'];
$password = $_POST['password'];
$address = $_POST['address'];
$wilaya = $_POST['wilaya'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$groupage = $_POST['groupage'];
$chronic = $_POST['chronic'];
$allergies = $_POST['allergies'];
$surgeries = $_POST['surgeries'];

$sqld = "SELECT * FROM patients WHERE name='$name' AND fn='$fn' AND dob='$dob'";
$resultd = $conn->query($sqld);

if ($resultd->num_rows > 0) {
  // output data of each row
while($row = $resultd->fetch_assoc()) {

if("$row[password]" == $password){

$sql = "UPDATE patients SET email='$email', pn='$pn', gender='$gender', height='$height', weight='$weight', chronic='$chronic', allergies='$allergies', surgeries='$surgeries', address='$address', wilaya='$wilaya', groupage='$groupage' WHERE name='$name' AND fn='$fn' AND dob='$dob'";

if ($conn->query($sql) === TRUE) {

setcookie("email", "", time() - (60*60*24*30), "/");
setcookie("email", "$email", time() + (60*60*24*30), "/");

setcookie("gender", "", time() - (60*60*24*30), "/");
setcookie("gender", "$gender", time() + (60*60*24*30), "/");

    header('Location: profile?true');
} else {
    header('Location: profile?false=errordb');
}}else{
	header('Location: profile?false=errorpassword');
}

}} else {

header('Location: profile?false=errordb');

}

$conn->close();


?>