<!DOCTYPE html>
<html>
  <head>
    <?php
    
    session_start();
    include 'connect.php';
    ?>
    <title>Universe</title>
    <link rel="stylesheet" type="text/css" href="style_sheets/stylesheet_universe.css">
  </head> 
  <body>
    <form method="GET">
      <div class="modules"> 
        <img src="afbeeldingen/3modules.png" alt="3modules" usemap="#3modules">
        <map name="3modules">
          <area shape="circle" coords="402,124,100" alt="" href="chat.php?kanaal_id=1">
          <area shape="circle" coords="108,488,100" alt="" href="chat.php?kanaal_id=2">
          <area shape="circle" coords="688,494,100" alt="" href="chat.php?kanaal_id=3">
        </map>
      </div> 
    </form>
  </body>
</html>




