<?php
if(!isset($_COOKIE['name'])){
  header('Location: login');
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
  <title>Profil - Ministère de la Santé</title>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="ui/semantic.js"></script>
  <script src="ui/semantic.min.js"></script>
  <script src="ui/components/form.js"></script>
  <script src="ui/components/transition.js"></script>
  <script src="https://unpkg.com/vue@2.6.11/dist/vue.js"></script>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.semanticui.min.css">
  <script src="ui/semantic.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script scr="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.11.3/JsBarcode.all.min.js"></script>

<script>
function printinfo(){
var divElements = document.getElementById('printable').innerHTML;
document.getElementById('printable').style.fontSize = "10px !important";
var oldPage = document.body.innerHTML;
document.body.innerHTML = divElements;
window.print();
document.body.innerHTML = oldPage;
location.reload();
}
</script>

    <style type="text/css">
    body {
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: grayscale;
        font-family: 'Almarai', sans-serif;
    }
    input {
        font-family: 'Almarai', sans-serif;
    }

    button {
        font-family: 'Almarai', sans-serif;
    }
    select {
        font-family: 'Almarai', sans-serif;
    }
    .ajs-button{
        cursor: pointer;
    }

    #sidebar {
        position: fixed;
        height: 100vh;
        background-color: #f5f5f5;
        padding-top: 68px;
        padding-left: 0;
        padding-right: 0;
    }

    #sidebar .ui.menu > a.item {
        padding: 10px 20px;
        line-height: 20px;
        color: #337ab7;
        border-radius: 0 !important;
        margin-top: 0;
        margin-bottom: 0;
    }

      #sidebar .ui.menu > a.item.active {
        background-color: #337ab7;
        color: white;
        border: none !important;
      }

      #sidebar .ui.menu > a.item:hover {
        background-color: #eee;
        color: #23527c;
      }

      #content {
        padding-top: 56px;
        padding-left: 20px;
        padding-right: 20px;
      }

      #content h1 {
        font-size: 36px;
      }

      #content .ui.dividing.header {
        width: 100%;
      }

      .ui.centered.small.circular.image {
        margin-top: 14px;
        margin-bottom: 14px;
      }

      .ui.borderless.menu {
        box-shadow: none;
        flex-wrap: wrap;
        border: none;
        padding-left: 0;
        padding-right: 0;
      }

      .ui.mobile.only.grid .ui.menu .ui.vertical.menu {
        display: none;
      }
    </style>
<script>
alertify.defaults.glossary.title = 'Ministère de la Santé';
alertify.defaults.glossary.ok = 'Oui';
alertify.defaults.glossary.cancel = 'Non';
</script>
  </head>

  <body id="root">
    <?php include('navbar.php') ?>
    <div class="ui padded grid">
      <?php include('sidebar.php') ?>

<?php
if(isset($_GET['false'])){
    if($_GET['false'] == "errordb"){
      echo "<script>alertify.alert('Erreur...');</script>";
    }elseif ($_GET['false'] == "errorpassword") {
      echo "<script>alertify.alert('Le mot de passe invalid');</script>";
    }else if($_GET['false'] == "erroractualpassword"){
      echo "<script>alertify.alert('Le mot de passe actuel invalid');</script>";
    }else{
      echo "<script>alertify.alert('La confirmation du nouvel mot de passe invalide');</script>";
    }
  }
?>

      <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
        <div class="ui padded grid">

          <div class="center aligned row">
          <div class="ui column grid profile">
  <div class="column">
    <div class="ui raised segment">
<a class="ui blue ribbon label" style="float: left;">Mon profil</a>

<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$dob = $_COOKIE['dob'];

$sql = "SELECT * FROM patients WHERE name='$name' AND fn='$fn' AND dob='$dob'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>

<form class="ui form" method="POST" action="savedata" enctype="multipart/form-data">

<div class="field">
    <label>Prenom(s)/ Nom</label>
    <div class="two fields">
      <div class="field">
<input type="text" placeholder="Prenom" name="name" required value="<?php echo "$row[name]"; ?>" readonly>
      </div>
      <div class="field">
<input type="text" placeholder="Nom" name="fn" required value="<?php echo "$row[fn]"; ?>" readonly>
      </div>
    </div>
</div>

<div class="field">
    <label>Date de naissance/ Sexe</label>
    <div class="two fields">
      <div class="field">
<input type="date" placeholder="Date de naissance" name="dob" required value="<?php echo "$row[dob]"; ?>" readonly>
      </div>
      <div class="field">
<select required name="gender" class="ui search dropdown">
    <option value="">--Sélectionner--</option>
    <option <?php if("$row[gender]" == "Mâle"){echo "selected";} ?> value="Mâle">Mâle</option>
    <option <?php if("$row[gender]" == "Femalle"){echo "selected";} ?> value="Femalle">Femalle</option>
</select>
      </div>
    </div>
</div>

<div class="field">
    <label>Adresse e-mail/ Numéro de téléphone</label>
    <div class="two fields">
      <div class="field">
<input type="email" placeholder="Adresse e-mail" name="email" required value="<?php echo "$row[email]"; ?>">
      </div>
      <div class="field">
<input type="tel" placeholder="Numéro de téléphone" name="pn" required value="<?php echo "$row[pn]"; ?>">
      </div>
    </div>
</div>

<div class="field">
    <label>Wilaya/ Adresse</label>
    <div class="two fields">
      <div class="field">
<select required name="wilaya" class="ui search dropdown">
<option value="" disabled>--Sélectionner--</option>
<option value="<?php echo "$row[wilaya]"; ?>" selected><?php echo "$row[wilaya]"; ?></option>
</select>
      </div>
      <div class="field">
<input type="text" placeholder="Adresse" name="address" required value="<?php echo "$row[address]"; ?>">
      </div>
    </div>
</div>

<div class="field">
    <label>Groupe sanguin/ La taille</label>
    <div class="two fields">
      <div class="field">
<select name="groupage" class="ui search dropdown">
<option value="">--Sélectionner--</option>
    <option <?php if("$row[groupage]" == "O+"){echo "selected";} ?> value="O+">O+</option>
    <option <?php if("$row[groupage]" == "O-"){echo "selected";} ?> value="O-">O-</option>
    <option <?php if("$row[groupage]" == "A+"){echo "selected";} ?> value="A+">A+</option>
    <option <?php if("$row[groupage]" == "A-"){echo "selected";} ?> value="A-">A-</option>
    <option <?php if("$row[groupage]" == "B+"){echo "selected";} ?> value="B+">B+</option>
    <option <?php if("$row[groupage]" == "B-"){echo "selected";} ?> value="B-">B-</option>
    <option <?php if("$row[groupage]" == "AB+"){echo "selected";} ?> value="AB+">AB+</option>
    <option <?php if("$row[groupage]" == "AB-"){echo "selected";} ?> value="AB-">AB-</option>
</select>
      </div>
      <div class="field">
<div class="ui right labeled input">
  <input name="height" type="number" placeholder="La taille" value="<?php echo "$row[height]"; ?>">
  <div class="ui basic label">
    <span>Cm</span>
  </div>
</div>
      </div>
    </div>
</div>

<div class="field">
    <label>Le poids/ Maladies chroniques</label>
    <div class="two fields">
      <div class="field">
<div class="ui right labeled input">
  <input name="weight" type="number" placeholder="Le poids" value="<?php echo "$row[weight]"; ?>">
  <div class="ui basic label">
    <span>Kg</span>
  </div>
</div>
      </div>
      <div class="field">
<input type="text" placeholder="Maladies chroniques" name="chronic" value="<?php echo "$row[chronic]"; ?>">
      </div>
    </div>
</div>

<div class="field">
    <label>Opérations chirurgicales/ Allergies</label>
    <div class="two fields">
      <div class="field">
<input type="text" placeholder="Opérations chirurgicales" name="surgeries" value="<?php echo "$row[surgeries]"; ?>">
      </div>
      <div class="field">
<input type="text" placeholder="Allergies" name="allergies" value="<?php echo "$row[allergies]"; ?>">
      </div>
    </div>
</div>

<div class="field">
<label>Mot de passe</label>
<input type="password" placeholder="Mot de passe" name="password" required>
</div>

<div class="field" style="margin-bottom: 10px !important;">
<button type="submit" class="ui labeled icon button green inverted right" style="width: 100% !important;"><i class="save icon"></i> Enregistrer</button>
  </div>

</form>

<?php
  }}else{
    echo "Aucun informations...";
  }
?>

<a class="ui red ribbon label" style="float: left;">Mot de passe</a>
      
<form class="ui form" method="POST" action="dopassword" enctype="multipart/form-data">

  <div class="field">
    <label>Mot de passe actuel</label>
      <div class="field">
<input type="password" required name="actualpassword" placeholder="Mot de passe actuel" minlength="8" maxlength="16">
      </div>
      <label>Nouveau mot de passe</label>
      <div class="field">
<input type="password" required name="newpassword" placeholder="Nouveau mot de passe" minlength="8" maxlength="16">
      </div>
      <label>Confirmez le nouveau mot de passe</label>
      <div class="field">
<input type="password" required name="newnewpassword" placeholder="Confirmez le nouveau mot de passe" minlength="8" maxlength="16">
      </div>
    </div>

  <div class="field" style="margin-bottom: 10px !important;">
<button type="submit" class="ui labeled icon button green inverted right" style="width: 100% !important;"><i class="save icon"></i> Enregistrer</button>
  </div>
</form>

    </div>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://semantic-ui.com/examples/assets/library/jquery.min.js"></script>
    <script src="ui/semantic.min.js"></script>
    <script>
      $(document).ready(function() {
        $(".ui.toggle.button").click(function() {
          $(".mobile.only.grid .ui.vertical.menu").toggle(100);
        });
      });
    </script>
  </body>
</html>