<?php
if(isset($_COOKIE['name'])){
  header('Location: dashboard');
}
$error = "";
if(isset($_POST['email']) && isset($_POST['password'])){
include('db.php');

$email=$_POST['email'];
$password=$_POST['password'];
$wilaya=$_POST['wilaya'];

$sql = "SELECT * FROM patients WHERE wilaya='$wilaya' AND email='$email' OR wilaya='$wilaya' AND pn='$email' OR wilaya='$wilaya' AND code='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {

if("$row[password]" == $password){

if("$row[status]" == "Activé"){

    setcookie("name", "$row[name]", time() + (60*60*24*30), "/");
    setcookie("fn", "$row[fn]", time() + (60*60*24*30), "/");
    setcookie("dob", "$row[dob]", time() + (60*60*24*30), "/");
    setcookie("email", "$row[email]", time() + (60*60*24*30), "/");
    setcookie("gender", "$row[gender]", time() + (60*60*24*30), "/");
	  
header('Location: dashboard');

}else{
	$error = "Votre compte est désactivé"; /* Status */
}
}else{
	$error = "Votre mot de passe est invalide"; /* Password */
}
}} else {
  $error = "Votre adresse e-mail/ numéro de téléphhone/ code sanitaire est invalide"; /* Email */
}

mysqli_close($conn);

}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="Ministère de la Santé">
  <meta name="keywords" content="Ministère de la Santé">
  <meta name="author" content="Djihad Dris">
  <meta name="theme-color" content="#ffffff">

  <!-- Site Properties -->
  <title>Connexion - Ministère de la Santé</title>
  <link rel="shortcut icon" type="text/css" href="square.webp">
  <link rel="stylesheet" type="text/css" href="ui/semantic.css">
  <link rel="stylesheet" type="text/css" href="ui/semantic.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/alertify.min.css">
  <link rel="stylesheet" href="css/themes/default.min.css">
  
  <script src="alertify.min.js"></script>
  <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
  <script src="ui/semantic.js"></script>
  <script src="ui/semantic.min.js"></script>
  <script src="ui/components/form.js"></script>
  <script src="ui/components/transition.js"></script>
  <script src="https://unpkg.com/vue@2.6.11/dist/vue.js"></script>

  <style type="text/css">
    body {
      /*background-image: url('background.jpg');
      background-repeat: no-repeat;
      background-size: 100% 100%;*/
      background-color: #dadada;
      font-family: 'Almarai', sans-serif;
      margin: 0;
      padding: 0;
    }
    input {
      font-family: 'Almarai', sans-serif;
    }
    button {
      font-family: 'Almarai', sans-serif;
    }
    .ajs-button{
      cursor: pointer;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 500px;
    }
  </style>
<script>
alertify.defaults.glossary.title = 'Ministère de la Santé';
alertify.defaults.glossary.ok = 'Envoyer';
alertify.defaults.glossary.cancel = 'Non';
</script>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            wilaya: {
              identifier  : 'wilaya',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez sélectionner votre wilaya'
                }
              ]
            },
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre adresse e-mail/ numéro de téléphhone/ code sanitaire'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : "Veuillez saisir votre mot de passe"
                },
                {
                  type   : 'length[8]',
                  prompt : 'Votre mot de passe doit comporter au moins 8 caractères'
                }
              ]
            }
          }
        });
    });
  </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <div class="content" id="content">{{ title }}</div>
    </h2>

    <form class="ui large form" method="POST">

    <div class="ui error message" style="<?php if($error != ""){ ?>display: block !important;<?php } ?>"><ul class='list'><li><?php echo $error; ?></li></ul></div>
      <div class="ui stacked segment">
        <div class="field">
          <select class="ui fluid search dropdown" name="wilaya"><?php include('wilayas.php'); ?></select>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="Votre adresse e-mail/ numéro de téléphhone/ code sanitaire">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Votre mot de passe">
          </div>
        </div>
<div class="ui buttons" style="width: 100% !important;">
<button class="ui teal button" type="submit" id="btn">{{ btn }}</button>
<div class="or" data-text="ou"></div>
<button onclick="resetpass()" class="ui button" type="button" id="password">{{ password }}</button>
</div>
      </div>
      
        <div class="ui error message"></div>

    </form>

    <div class="ui message" id="register">
        {{ title }}? <a href="register">{{ link }}</a>
    </div>
  </div>
</div>

<script src="login.js"></script>
<script>
$('.ui.search.dropdown').dropdown();

function resetpass(){
  alertify.prompt("Votre adresse e-mail/ numéro de téléphhone/ code sanitaire", "",
  function(evt, value ){
    if(value != ""){
    $.ajax({
        url: "sendmail.php",
        type: "POST",
        data: {
          epc: value
        },
        cache: false,
        success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
alertify.success(dataResult.message);
}else{
alertify.error(dataResult.message);
}
        }
      });
    }else{
      alertify.error('Veuillez saisir votre adresse e-mail/ numéro de téléphhone/ code sanitaire');
    }
  },
  function(){
    alertify.error('Cancel');
  })
  ;
}
</script>

</body>

</html>