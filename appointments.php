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
  <title>Les rendez-vous - Ministère de la Santé</title>
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


<!-- Print Modal -->
<div class="ui small modal card">
  <i class="close icon"></i>
  <div class="header">
   <h3><i class="eye icon"></i> La carte du RDV</h3>
  </div>
      <div class="content">

<div id="printable">

<table class="ui celled striped selectable table">
  <thead>
    <tr class="center aligned">
      <th>Nom</th>
      <th>Prenom(s)</th>
      <th>Date de naissance</th>
    </tr>
  </thead>
  <tbody>
    <tr class="center aligned">
      <td id="fnp"></td>
      <td id="np"></td>
      <td id="dobp"></td>
    </tr>
  </tbody>
</table>

<table class="ui celled striped selectable table">
  <thead>
    <tr class="center aligned">
      <th>Validation</th>
      <th>Date du RDV</th>
      <th>Heure du RDV</th>
      <th>Observation</th>
      <th>Prix</th>
      <th>Versement</th>
      <th>Reste</th>
    </tr>
  </thead>
  <tbody id="appointslist">

  </tbody>
</table>

</div>

<center>
<div style="display: inline-block; margin-top: 10px; margin-bottom: -2.5px;">
<span style="margin-right: 15px;"><i class="circle icon green" style="margin-right: -2px;"></i> Le RDV d'aujourd'hui</span>
<span style="margin-right: 15px;"><i class="circle icon blue" style="margin-right: -2px;"></i> Le RDV à venir</span>
<span><i class="circle icon orange" style="margin-right: -2px;"></i> Ancien RDV</span>
</div>
</center>

      </div>
      <div class="actions">
         <center>
    <div class="ui buttons" style="width: 100% !important;">
      <button class="ui positive left labeled icon button" onclick="printinfo()"><i class="print icon"></i>
      Imprimer</button>
  <div class="or" data-text="ou"></div>
    <button class="ui negative right labeled icon button"><i class="close icon"></i> Fermer</button>
</div>
</center>
      </div>
    </div>


<!-- Add Modal -->
<div class="ui basic modal add">
  <i class="close icon"></i>
  <div class="header">
   <h3><i class="plus icon"></i> Créer un rendez-vous</h3>
  </div>
      <div class="content">
<div class="ui form">

  <div class="field">
    <div class="three fields">
     <div class="field">
      <label style="color: white !important;">Wilaya</label>
       <select class="ui search dropdown" id="wilaya" onchange="getm()"><?php include('wilayas.php'); ?></select>
     </div> 
     <div class="field">
      <label style="color: white !important;">Spécialité</label>
      <select class="ui search dropdown" id="specialty" onchange="getm()">
      <option value="">--Sélectionner--</option>
    <?php
    include "db.php";
    $sql = "SELECT * FROM specialties";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<option value='$row[namefr]'>$row[namefr] ($row[namear])</option>";
  }
} else {}
$conn->close();
    ?>
      </select>
     </div>
     <div class="field">
      <label style="color: white !important;">Médecin/ Pharmacien</label>
      <select class="ui search dropdown" id="doctor"><option value="">--Sélectionner--</option></select>
     </div>
    </div>
  </div>

  <div class="field">
    <div class="two fields">
     <div class="field">
      <label style="color: white !important;">Date</label>
       <input required id="todaydate" type="date" placeholder="Date du rendez-vous" min="<?php echo date("Y-m-d"); ?>">
     </div> 
     <div class="field">
      <label style="color: white !important;">Heure</label>
       <input required id="todaytime" type="time" placeholder="Heure du rendez-vous">
     </div>
    </div>
  </div>

</div>
</div>
      <div class="actions">
    <center>
    <div class="ui buttons" style="width: 100% !important;">
      <button onclick="savetodata()" class="ui green left labeled icon button"><i class="plus icon"></i> Ajouter</button>
      <div class="or" data-text="ou"></div>
  <button class="ui negative right labeled icon button"><i class="close icon"></i> Fermer</button>
   </div>
   </center>
</div>
  </div>


      <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
        <div class="ui padded grid">
          <div class="row">
            <h1 class="ui huge dividing header">Les rendez-vous</h1>
          </div>
        </div>
<div style="float: right; position: relative;">
<div class="ui buttons" style="width: 100% !important;">
<button class="ui blue left labeled icon button inverted" onclick="Card()">
  <i class="address card icon"></i>
  La carte du RDV
</button>
<div class="or" data-text="ou"></div>
<button class="ui green right labeled icon button inverted" onclick="Add()">
  <i class="add icon"></i>
  Créer un RDV
</button>
</div>
</div>
<script type="text/javascript">
function Add(){
$('.ui.basic.modal.add').modal('show');
}
</script>
          <div class="center aligned row">
            <table class="ui celled selectable responsive table" width="100%" id="appointments">
              <thead>
                <tr>
                  <th></th>
                  <th>#</th>
                  <th>Validation</th>
                  <th>Médecin/ Pharmacien</th>
                  <th>Date</th>
                  <th>Heure</th>
                  <th>Observation</th>
                  <th>Prix</th>
                  <th>Versement</th>
                  <th>Reste</th>
                  <th>Actions</th>
                </tr>
              </thead>
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
      $('.ui.search.dropdown').dropdown();

function getm(){
var wilaya = document.getElementById('wilaya').value;
var specialty = document.getElementById('specialty').value;

$.ajax({
        url: "getdoctors.php",
        type: "POST",
        data: {
          wilaya: wilaya,
          specialty: specialty
        },
        cache: false,
        success: function(dataResult){
document.getElementById('doctor').innerHTML = dataResult;
        }
      });
}

function Card() {
$('.ui.modal.card').modal('show');
var name = "<?php echo $_COOKIE['name'] ?>";
var fn = "<?php echo $_COOKIE['fn'] ?>";
var dob = "<?php echo $_COOKIE['dob'] ?>";
$('#np').html(name);
$('#fnp').html(fn);
$('#dobp').html(dob);

$.ajax({
        url: "appointsdates.php",
        type: "POST",
        data: {
          name: name,
          fn: fn,
          dob: dob
        },
        cache: false,
        success: function(dataResult){

            document.getElementById('appointslist').innerHTML = dataResult;  
     
        }
      });

}

let table = new DataTable('#appointments', {
    columnDefs: [
        {
            target: 0,
            visible: false,
            searchable: false
        }
    ],
    ordering: true,
    searching: true,
    paging: true,
    processing: true,
    destroy: true,
    scrollX: true,
    lengthChange: true,
    responsive: true,
        "language": {
    "decimal":        "",
    "emptyTable":     "Aucun rendez-vous disponible",
    "info":           "Affichage de _START_ à _END_ rendez-vous sur _TOTAL_",
    "infoEmpty":      "Affichage de 0 à 0 sur 0 rendez-vous",
    "infoFiltered":   "(filtré à partir de _MAX_ rendez-vous au total)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Afficher les rendez-vous du _MENU_",
    "loadingRecords": "Chargement...",
    "processing":     "",
    "search":         "Chercher:",
    "zeroRecords":    "Aucun rendez-vous correspondants trouvés",
    "paginate": {
        "first":      "Première",
        "last":       "Dernière",
        "next":       "Prochaine",
        "previous":   "Précédente"
    },
    "aria": {
        "sortAscending":  ": activer pour trier les colonnes par ordre croissant",
        "sortDescending": ": activer pour trier les colonnes par ordre décroissant"
    }
        },
        "ajax": {
"url": "ajaxappointments.php",
"dataSrc": ""
        },
        "columns": [
{"ID": ""},
{"#": "#"},
{"valid": "Validation"},
{"mp": "Médecin/ Pharmacien"},
{"date": "Date"},
{"time": "Heure"},
{"observation": "Observation"},
{"price": "Prix"},
{"pay": "Versement"},
{"remain": "Reste"},
{"actions": "Actions"}
        ]
          });
table.on('click', '.del', function (e) {
var tr = $(this).closest('tr');
var data = table.row(tr).data();

alertify.confirm("Voulez-vous vraiment annuler ce rendez-vous?",
  function(){
$.ajax({
        url: "appointdel.php",
        type: "POST",
        data: {
          ID: data[0]
        },
        cache: false,
        success: function(dataResult){
if(dataResult == "200"){
table.ajax.reload(null, false);
alertify.success('Le rendez-vous a été annulé avec succès');
}else{
alertify.error('Erreur..');
}
        }
      });
  },
  function(){
    alertify.error('Cancel');
  });

});

function savetodata(){
var doctor = document.getElementById('doctor').value;
var date = document.getElementById('todaydate').value;
var time = document.getElementById('todaytime').value;

if(doctor != ""){
  if(date != ""){
    if(time != ""){
$.ajax({
url: "addappointment.php",
type: "POST",
data: {
doctor: doctor,
date: date,
time: time
},
cache: false,
success: function(dataResult){
var dataResult = JSON.parse(dataResult);
if(dataResult.statusCode==200){
$('.ui.modal.add').modal('hide');
alertify.success(dataResult.message);
table.ajax.reload(null, false);
}else{
alertify.error(dataResult.message);
}
}
});
    }else{
      alertify.error("Veuillez sélectionner l'heure");
    }
  }else{
    alertify.error("Veuillez sélectionner la date");
  }
}else{
  alertify.error("Veuillez sélectionner le médecin/ pharmacien");
}

}

    </script>
  </body>
</html>