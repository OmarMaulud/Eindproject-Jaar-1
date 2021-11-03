<?php
include 'connect.php';
$select;
$kanaal_id;

if (isset($_POST['msg'])) {
    $insert = "INSERT INTO berichten (bericht, kanaal_id, auteur_id ) VALUES ('" . htmlentities($_POST["msg"], ENT_HTML5, 'UTF-8') . "','" . $_GET["kanaal_id"] .  "','" . $_COOKIE["naam"] .  "')";
    $stmt = $pdo->query($insert);
    $_POST["msg"] = "";
}
if (isset($_GET['kanaal_id'])) {
    $kanaal_id = $_GET['kanaal_id'];
    setcookie("kanaal_id", $kanaal_id);
    $select = "SELECT module FROM kanalen WHERE id = '$kanaal_id'";
    $kanaal = $pdo->query($select)->fetch();
}
?>
<!DOCTYPE html>
<html>
    <head>
    <title><?= $kanaal['module'] ?></title>
    <link rel="stylesheet" type="text/css" href="style_sheets/style.css">
    </head>
    <body>
    <div class="Header">  
     <div class="logo"> 
      <img src="afbeeldingen/logo_white.png" alt="">
     </div>
     <div class="icons">
     
      <div class="Home">
        <p><a href="index.php">
        <img src="afbeeldingen/home_icon.png" alt="" width="30px" height="30px">
        <p><h1>Home</h1></p>
        </a></p>
      </div>
     
      <div class="Universe">
        <p><a href="universe.php">
        <img src="afbeeldingen/universe_icon.png" alt="" width="30px" height="30px">
        <p><h1>Universe</h1></p>
        </a></p>
      </div>
      
      <div class="Reviews">
        <img src="afbeeldingen/reviews_icon.png" alt="">
        <h1>Reviews</h1>
      </div>
      
      <div class="Feedback">
        <img src="afbeeldingen/feedback_icon.png" alt="">
        <h1>Feedback</h1>
      </div>
     
      <div class="Doelen">
        <img src="afbeeldingen/doelen_icon.png" alt="">
        <h1>Doelen</h1>
      </div>
      
      <div class="Leaderboard">
        <img src="afbeeldingen/leaderbord_icon.png" alt="">
        <h1>Leaderboard</h1>
      </div>
      
      <div class="Meer">
        <img src="afbeeldingen/meer_icon.png" alt="">
        <h1>Meer</h1>
      </div>
     </div>
     
     <div class="profile">
      <div> 
        <img src="afbeeldingen/credits_icon.png" alt="">
      </div>
     
      <h2>4</h2>
        <div>
          <img src="afbeeldingen/profile.png" alt="profile">
        </div>
      </div>
    </div>
    <?php include 'gebruikersnaam.php';?>
    <?php
    if ($_GET["kanaal_id"] == 1) {
        echo "<img src=afbeeldingen/htmlcss.png>";
    } if ($_GET["kanaal_id"] == 2) {
        echo "<img src=afbeeldingen/gitbeginner.png>";
    } if ($_GET["kanaal_id"] == 3) {
        echo "<img src=afbeeldingen/phpbeginner.png>";
    }
    ?>
    <button class="open-button" onclick="openForm()">Chat</button>
        <div class="chat-popup" id="myForm">
        <form action="" method="POST" class="form-container">      
            <button type="button" class="btn cancel knop_close" onclick="closeForm()"><img src="afbeeldingen/cross_icon.png"  width="25px" height="25px"  alt=""></button>
            <button type="reload" class="btn reload knop_reload" onclick="openForm()"><img src="afbeeldingen/reload_icon.png" width="25px" height="25px" alt=""></button>
            <h2><?= $kanaal['module'] ?></h2>
            <div class="chat_berichten">
                <?php
                $query = $pdo->query("SELECT auteur_id, bericht, tijd_verstuurd FROM berichten WHERE kanaal_id=$kanaal_id");
                $query = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($query as $message) {
                    ?>
                    <p class="bericht">
                    <span class='auteur'><?= $message['auteur_id'] ?>:</span>
                    <span class="bericht_message"><?= $message["bericht"]?></span>
                    <span class="bericht_tijd"><?= date("H:i", strtotime($message["tijd_verstuurd"])) ?></span>
                    </p>
                    <?php
                }
                ?>
                <br>
            </div>
            <label for="msg"><b>Message</b></label>
              <div class = "text_close_send">
                <textarea placeholder="Type message..." id="msg" name="msg" height="20px"></textarea>
                <button type="submit" id="msg_send" value="Bericht" class="btn knop_send"><img src="afbeeldingen/send_icon.png"  width="20px" height="20px" alt=""></button>
              </div>
        </form>
        <?php include 'script.js';?>
        </div>
    </body>
</html>