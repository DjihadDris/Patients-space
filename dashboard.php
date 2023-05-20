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
  <title>Tableau de bord - Ministère de la Santé</title>
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
      <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
        <div class="ui padded grid">
          <div class="row">
            <h1 class="ui huge dividing header">Tableau de bord</h1>
          </div>
          <div class="center aligned row">

            <div class="eight wide mobile four wide tablet four wide computer column">
              <h2 class="ui center aligned icon header">
                 <i class="circular list icon teal"></i>
                 <div class="ui large basic label">Rendez-vous d'aujourd'hui:
<span>
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$date = date('Y-m-d');

$query = "SELECT COUNT(*) AS time FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND date='$date' AND del<>'yes'";
$result = mysqli_query($conn, $query);
if ($result) {
$row = mysqli_fetch_assoc($result);
$rowCount = $row['time'];
echo "$rowCount";
}
mysqli_close($conn);
?>
</span>
</div>
              </h2>
            </div>

            <div class="eight wide mobile four wide tablet four wide computer column">
              <h2 class="ui center aligned icon header">
                 <i class="circular close icon red"></i>
                 <div class="ui large basic label">Rendez-vous manqués:
<span>
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$date = date('Y-m-d');

$query = "SELECT COUNT(*) AS time FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND valid='' AND date<>'$date' AND date<'$date' AND del<>'yes'";
$result = mysqli_query($conn, $query);
if ($result) {
$row = mysqli_fetch_assoc($result);
$rowCount = $row['time'];
echo "$rowCount";
}
mysqli_close($conn);
?>
</span>
</div>
              </h2>
            </div>

            <div class="eight wide mobile four wide tablet four wide computer column">
              <h2 class="ui center aligned icon header">
                 <i class="circular check icon green"></i>
                 <div class="ui large basic label">Rendez-vous validés:
<span>
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$date = date('Y-m-d');

$query = "SELECT COUNT(*) AS time FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND valid='yes' AND del<>'yes'";
$result = mysqli_query($conn, $query);
if ($result) {
$row = mysqli_fetch_assoc($result);
$rowCount = $row['time'];
echo "$rowCount";
}
mysqli_close($conn);
?>
</span>
                 </div>
              </h2>
            </div>

            <div class="eight wide mobile four wide tablet four wide computer column">
              <h2 class="ui center aligned icon header">
                 <i class="circular redo icon blue"></i>
                 <div class="ui large basic label">Rendez-vous à venir:
<span>
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$date = date('Y-m-d');

$query = "SELECT COUNT(*) AS time FROM appointments WHERE namepatient='$name' AND fnpatient='$fn' AND date>'$date' AND del<>'yes'";
$result = mysqli_query($conn, $query);
if ($result) {
$row = mysqli_fetch_assoc($result);
$rowCount = $row['time'];
echo "$rowCount";
}
mysqli_close($conn);
?>
</span>
                 </div>
              </h2>
            </div>

            <!--<div class="eight wide mobile four wide tablet four wide computer column">
              <img class="ui centered small circular image" src="background.jpg">
              <div class="ui large basic label">Label</div>
              <p>Something else</p>
            </div>-->

          </div>

          <div class="ui hidden section divider"></div>
          <div class="row">
            <h1 class="ui huge dividing header">Statistiques des rendez-vous</h1>
          </div>

<canvas id="myChart"></canvas>

  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php
include('db.php');
$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$sql = "SELECT * FROM appointments WHERE del='' AND namepatient='$name' AND fnpatient='$fn' GROUP BY date ORDER BY date ASC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo "'$row[date]', ";
}}
$conn->close();
?>],
        datasets: [{
          label: 'Rendez-vous',
          data: [<?php include('db.php');
$query = "SELECT date, COUNT(*) AS time FROM appointments WHERE del='' AND namepatient='$name' AND fnpatient='$fn' GROUP BY date ORDER BY date ASC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $date = $row['date'];
        $time = $row['time'];
        echo "'$time', ";
    }}
mysqli_close($conn); ?>],
          borderColor: '#00b5ad',
          backgroundColor: 'rgba(34,36,38,.15)',
          tension: 0.4,
        }]
      },
    });
  </script>

          <div class="ui hidden section divider"></div>
          <div class="row">
            <h1 class="ui huge dividing header">Rendez-vous d'aujourd'hui</h1>
          </div>
          <div class="row">
            <table class="ui celled selectable responsive table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Validation</th>
                  <th>Médecin/ Pharmacien</th>
                  <th>Heure du RDV</th>
                  <th>Observation</th>
                  <th>Prix</th>
                  <th>Versement</th>
                  <th>Reste</th>
                </tr>
              </thead>
              <tbody>
<?php
include('db.php');

$name = $_COOKIE['name'];
$fn = $_COOKIE['fn'];
$dob = $_COOKIE['dob'];
$date = date('Y-m-d');
$i = 1;

$sql = "SELECT * FROM appointments WHERE del='' AND namepatient='$name' AND fnpatient='$fn' AND dob='$dob' AND date='$date' ORDER BY time ASC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo $i;$i++; ?></td>
<td><?php if("$row[valid]" == "yes"){echo "<i class='check icon green'></i>";}else{echo "<i class='close icon red'></i>";} ?></td>
<td><?php echo $row['mp']; ?></td>
<td><?php echo $row['time']; ?></td>
<td><?php echo $row['observation']; ?></td>
<td><?php if("$row[price]" == "-"){echo "-";}else{echo number_format("$row[price]", 2)." DA";} ?></td>
<td><?php if("$row[pay]" == "-"){echo "-";}else{echo number_format("$row[pay]", 2)." DA";} ?></td>
<td><?php if("$row[remain]" == "-"){echo "-";}else{echo number_format("$row[remain]", 2)." DA";} ?></td>
</tr>
<?php
}}else{
?>
<tr>
<td colspan="7">Aucun rendez-vous..</td>
</tr>
<?php
}
$conn->close();
?>
              </tbody>
            </table>
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