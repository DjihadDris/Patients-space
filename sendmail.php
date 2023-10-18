<?php
if(!isset($_POST['epc'])){
    header('Location: login');
}
use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
include('db.php');
$epc=$_POST['epc'];
$sql = "SELECT * FROM patients WHERE email='$epc' OR pn='$epc' OR code='$epc'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

$name = $row['name'];
$email = $row['email'];
$password = $row['password'];

$message = "Votre mot de passe est: ".$password."\r\rVeuillez changer votre mot de passe après vous être connecté\r\rMinistère de la Santé";

try {
    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Your SMTP server hostname
    $mail->SMTPAuth = true;
    $mail->Username = 'djihad139@gmail.com'; // Your SMTP username
    $mail->Password = 'bxcovnpcwrfreoct'; // Your SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable encryption, 'ssl' also accepted
    $mail->Port = 465; // TCP port to connect to

    // Sender and recipient details
    $mail->setFrom('no-reply@patient.epizy.com', 'Ministère de la Santé');
    $mail->addAddress("$email", "$name");

    // Email content
    $mail->Subject = 'Récupération de mot de passe - Ministère de la Santé';
    $mail->Body = "$message";

    // Send the email
    $mail->send();
    echo json_encode(array("statusCode"=>200, "message"=>"Votre mot de passe a été envoyé à votre adresse e-mail avec succès"));
} catch (Exception $e) {
    echo json_encode(array("statusCode"=>201, "message"=>"Erreur: ".$mail->ErrorInfo));
}

  }}else{
    echo json_encode(array("statusCode"=>201, "message"=>"Il n'y a pas de compte avec ces informations"));
  }
?>