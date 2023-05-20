<?php
include('db.php');

$name = $_POST['name'];
$fn = $_POST['fn'];
$pn = $_POST['pn'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$chronic = $_POST['chronic'];
$surgeries = $_POST['surgeries'];
$allergies = $_POST['allergies'];
$groupage = $_POST['groupage'];
$wilaya = $_POST['wilaya'];
$address = $_POST['address'];
$password = $_POST['password'];
$n=10; 

function getName($n) { 
/* A, M, Q, W, Z */

    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 

    $randomString = ""; 

    for ($i = 0; $i < $n; $i++) { 

        $index = rand(0, strlen($characters)-1); 

        $randomString .= $characters[$index]; 

    } 

  

    return $randomString; 

} 

$code = getName($n);

$sqls = "SELECT * FROM patients WHERE wilaya='$wilaya' AND email='$email' OR wilaya='$wilaya' AND pn='$pn'";
$results = $conn->query($sqls);

if ($results->num_rows > 0) {
  while($row = $results->fetch_assoc()) {
    $error = "Votre compte est déjà enregistré. Veuillez vous connecter. <a href='login'>Connexion</a>";
  header('Location: register?false='.$error);
  }}else{

$sql = "INSERT INTO patients (name, fn, pn, email, gender, dob, password, mpi, status, del, notes, code, address, wilaya, height, weight, groupage, allergies, surgeries, chronic)
VALUES ('$name', '$fn', '$pn', '$email', '$gender', '$dob', '$password', '', 'Activé', '', '', '$code', '$address', '$wilaya', '$height', '$weight', '$groupage', '$allergies', '$surgeries', '$chronic')";

if ($conn->query($sql) === TRUE) {
  $success = "Votre nouveau compte a été enregistré avec succès. <a href='login'>Connexion</a>";
  header('Location: register?true='.$success);
} else {
  $error = "Votre compte n'est pas enregistré.. Veuillez réessayer plus tard..";
  header('Location: register?false='.$error);
}
  }

$conn->close();

?>