<?php
if(isset($_COOKIE['name'])){
 header('Location: dashboard');
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
  <title>Inscription - Ministère de la Santé</title>
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
      max-width: 1000px;
    }
  </style>
<script>
alertify.defaults.glossary.title = 'Ministère de la Santé';
alertify.defaults.glossary.ok = 'Oui';
alertify.defaults.glossary.cancel = 'Non';
</script>
  <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            name: {
              identifier  : 'name',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre prenom'
                }
              ]
            },
            fn: {
              identifier  : 'fn',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre nom'
                }
              ]
            },
            gender: {
              identifier  : 'gender',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez sélectionner votre sexe'
                }
              ]
            },
            dob: {
              identifier  : 'dob',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre date de naissance'
                }
              ]
            },
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre e-mail'
                },
                {
                  type   : 'email',
                  prompt : 'Veuillez entrer une adresse e-mail valide'
                }
              ]
            },
            pn: {
              identifier  : 'pn',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre numéro de téléphone'
                }
              ]
            },
            wilaya: {
              identifier  : 'wilaya',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez sélectionner votre wilaya'
                }
              ]
            },
            address: {
              identifier  : 'address',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Veuillez saisir votre adresse'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : "Veuillez saisir le mot de passe"
                },
                {
                  type   : 'length[8]',
                  prompt : 'Votre mot de passe doit comporter au moins 8 caractères'
                }
              ]
            },
            cpassword: {
              identifier  : 'cpassword',
              rules: [
                {
                  type   : 'empty',
                  prompt : "Veuillez confirmer votre mot de passe"
                },
                {
                  type   : 'match[password]',
                  prompt : 'Confirmer le mot de passe correctement'
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

    <form class="ui large form" method="POST" action="dopatient">

    <div class="ui success message" style="<?php if(isset($_GET['true'])){ ?>display: block !important;<?php } ?>"><ul class='list'><li><?php echo $_GET['true']; ?></li></ul></div>
    <div class="ui error message" style="<?php if(isset($_GET['false'])){ ?>display: block !important;<?php } ?>"><ul class='list'><li><?php echo $_GET['false']; ?></li></ul></div>
<div class="ui stacked segment">

<div class="ui two column very relaxed stackable grid">
<div class="column">

<div class="field">
<label>Prenom(s) <span style="color: red;">*</span></label>
<input required name="name" type="text" placeholder="Prenom">

<label>Nom <span style="color: red;">*</span></label>
<input required name="fn" type="text" placeholder="Nom">
</div>

<div class="field">
<label>Sexe <span style="color: red;">*</span></label>
<select required name="gender" class="ui search dropdown">
<option value="">--Sélectionner--</option>
<option value="Mâle">Mâle</option>
<option value="Femalle">Femalle</option>
</select>

<label>Date de naissance <span style="color: red;">*</span></label>
<input required name="dob" type="date" placeholder="Date de naissance">
</div>

<div class="field">
<label>Adresse e-mail <span style="color: red;">*</span></label>
<input required name="email" type="email" placeholder="Adresse e-mail">
<label>Numéro de téléphone <span style="color: red;">*</span></label>
<input required name="pn" type="tel" placeholder="Numéro de téléphone" maxlength="10">
</div>

<div class="field">
<label>Wilaya <span style="color: red;">*</span></label>
<select name="wilaya" class="ui search dropdown" required>
<?php include('wilayas.php'); ?>
</select>

<label>Adresse <span style="color: red;">*</span></label>
<input name="address" type="text" placeholder="Adresse" required>
</div>

</div>
<div class="middle aligned column">

<div class="field">
<label>Groupe sanguin</label>
<select name="groupage" class="ui search dropdown">
    <option value="">--Sélectionner--</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
</select>

<label>La taille</label>
<div class="ui right labeled input">
<input name="height" type="number" placeholder="La taille">
<div class="ui basic label">
<span>Cm</span>
</div>
</div>
</div>

<div class="field">
<label>Le poids</label>
<div class="ui right labeled input">
<input name="weight" type="number" placeholder="Le poids">
<div class="ui basic label">
<span>Kg</span>
</div>
</div>

<label>Maladies chroniques</label>
<input name="chronic" type="text" placeholder="Maladies chroniques">
</div>

<div class="field">
<label>Opérations chirurgicales</label>
<input name="surgeries" type="text" placeholder="Opérations chirurgicales">

<label>Allergies</label>
<input name="allergies" type="text" placeholder="Allergies">
</div>

<div class="field">
<label>Mot de passe <span style="color: red;">*</span></label>
<input required type="password" name="password" placeholder="Mot de passe">

<label>Confirmer le mot de passe <span style="color: red;">*</span></label>
<input required type="password" name="cpassword" placeholder="Confirmer le mot de passe">
</div>

</div>
</div>
<div class="ui vertical divider"></div>

      </div>
      <div class="ui fluid large teal submit button" id="btn">{{ btn }}</div>
        <div class="ui error message"></div>
    </form>
    <a class="ui fluid large white submit button" id="login" href="login"><div>{{ link }}</div></a>
  </div>
</div>

<script src="register.js"></script>
<script>
$('.ui.search.dropdown').dropdown();
</script>

</body>

</html>