<!DOCTYPE html>
<html>
    <head>
        <?php

        include 'connect.php';

        if (isset($_POST["naam"])) {
            $naam = $_POST["naam"];
            setcookie("naam", $naam);
            $query = "INSERT INTO berichten (auteur_id)
            VALUES (\"$naam\")";
            $pdo->query($query);
            header("Location: chat.php?kanaal_id=" . $_COOKIE['kanaal_id']);
        }
        ?>
        <title>
        <?php 
        if ($_GET["kanaal_id"] == 1) {
            echo "HTML/CSS";
        } if ($_GET["kanaal_id"] == 2) {
            echo "Git beginner";
        } if ($_GET["kanaal_id"] == 3) {
            echo "PHP Beginner";
        }
        ?>
        </title>
    </head>
    <body>
        <form method='POST'>
        <?php
        if (isset($_COOKIE["naam"])) {
            ?>
            <h2>Gebruikersnaam: <?= $_COOKIE["naam"] ?></h2>
            <?php
        }
        ?> 
            <input type="text" name="naam" required>
            <input type="submit" value="Verzenden" >
        </form>
    </body>
</html>