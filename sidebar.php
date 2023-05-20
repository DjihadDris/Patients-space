<div class="three wide tablet only three wide computer only column" id="sidebar">
        <div class="ui vertical borderless fluid text menu">
          <a class="<?php if($_SERVER['REQUEST_URI'] == "/dashboard"){echo "active";} ?> item" href="dashboard">Tableau de bord</a>
          <a class="<?php if($_SERVER['REQUEST_URI'] == "/appointments"){echo "active";} ?> item" href="appointments">Les rendez-vous</a>
          <a class="<?php if($_SERVER['REQUEST_URI'] == "/prescriptions"){echo "active";} ?> item" href="prescriptions">Les ordonnances</a>
          <!--<div class="ui hidden divider"></div>-->
        </div>
      </div>