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
  <title>Les ordonnances - Ministère de la Santé</title>
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
<div class="ui modal print small">
  <i class="close icon"></i>
  <div class="header">
   <h3><i class="print icon"></i> Imprimer l'ordonnance</h3>
  </div>
      <div class="content">
<div id="printable">
<table class="ui celled striped selectable table">
  <thead>
  <tr class="center aligned">
    <th>Nom</th>
    <th>Prenom(s)</th>
    <th>Date de naissance (Âge)</th>
    <th>Date</th>
  </tr>
</thead>
<tbody>
  <tr class="center aligned">
    <td id="fn"></td>
    <td id="name"></td>
    <td id="dob"></td>
    <td id="dos"></td>
  </tr>
</tbody>
</table>
<br>
<table id="showhide" class="ui celled striped selectable table">
<thead>
  <tr class="center aligned">
<th colspan="5"><u>ORDONNANCE</u></th>
  </tr>
</thead>
<tbody>
  <tr class="left aligned">
    <td colspan="5">
       <div style="white-space: pre-wrap; margin-left: 75px;" id="pres"></div>
    </td>
  </tr>
</tbody>
</table>
</div>

      </div>
      <div class="actions">
         <center>
    <div class="ui buttons" style="width: 100% !important;">

<button disabled class="ui positive left labeled icon button" onclick="printinfo()" id="printbtn"><i class="print icon"></i> Imprimer</button>
<div class="or" data-text="ou"></div>
<button class="ui negative right labeled icon button"><i class="close icon"></i> Fermer</button>
</div>
</center>
      </div>
    </div>

      <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
        <div class="ui padded grid">
          <div class="row">
            <h1 class="ui huge dividing header">Les ordonnances</h1>
          </div>

          <div class="center aligned row">
            <table class="ui celled selectable responsive table" width="100%" id="prescriptions">
              <thead>
                <tr>
                  <th></th>
                  <th>#</th>
                  <th>Médecin</th>
                  <th>Date</th>
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

let table = new DataTable('#prescriptions', {
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
    "emptyTable":     "Aucun ordonnances disponible",
    "info":           "Affichage de _START_ à _END_ ordonnances sur _TOTAL_",
    "infoEmpty":      "Affichage de 0 à 0 sur 0 ordonnances",
    "infoFiltered":   "(filtré à partir de _MAX_ ordonnances au total)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Afficher les ordonnances du _MENU_",
    "loadingRecords": "Chargement...",
    "processing":     "",
    "search":         "Chercher:",
    "zeroRecords":    "Aucun ordonnances correspondants trouvés",
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
"url": "ajaxprescriptions.php",
"dataSrc": ""
        },
        "columns": [
{"ID": ""},
{"#": "#"},
{"mp": "Médecin"},
{"date": "Date"},
{"actions": "Actions"}
        ]
          });
table.on('click', '.show', function (e) {
    document.getElementById('printbtn').disabled = true;
var tr = $(this).closest('tr');
var data = table.row(tr).data();
$('.ui.modal.print').modal('show');
document.getElementById('pres').innerHTML = "";

var name = "<?php echo $_COOKIE['name'] ?>";
var fn = "<?php echo $_COOKIE['fn'] ?>";
var dobi = "<?php echo $_COOKIE['dob'] ?>";

var dob = new Date(dobi);
var month_diff = Date.now() - dob.getTime();
var age_dt = new Date(month_diff);   
var year = age_dt.getUTCFullYear();
var age = Math.abs(year - 1970);

$('#name').html(name);
$('#fn').html(fn);
$('#dob').html(dobi+" ("+age+" ans)");
$('#dos').html(data[3]);

$.ajax({
        url: "getpres.php",
        type: "POST",
        data: {
          name: name,
          fn: fn,
          dob: dobi,
          date: data[3]
        },
        cache: false,
        success: function(dataResult){
document.getElementById('pres').innerHTML = dataResult;
document.getElementById('printbtn').disabled = false;
        }
      });

});
    </script>
  </body>
</html>