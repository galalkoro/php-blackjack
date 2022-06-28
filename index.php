<?php


// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);


require 'codes/Blackjack.php';
require 'codes/Player.php';


// Use this function when you need to need an overview of these variables

function whatIsHappening() {
  echo '<h2>$_GET</h2>';
   var_dump($_GET);
   echo '<h2>$_POST</h2>';
   var_dump($_POST);
   echo '<h2>$_COOKIE</h2>';
   var_dump($_COOKIE);
   echo '<h2>$_SESSION</h2>';
   var_dump($_SESSION);

}

// We are going to use session variables, so we need to enable sessions
session_start();

$_SESSION['blackjack'] = new Blackjack();

$player = $_SESSION["blackjack"]->getPlayer();
$dealer = $_SESSION["blackjack"]->getDealer();

if (isset($_POST["name"])){
    echo "started";
    if ($_POST["name"]=== "Hit"){
        echo "Player hit";
    }elseif ($_POST["name"]=== "Stand"){
        echo "player stand";
    }elseif ($_POST["name"]=== "Surrender"){
        echo "Player surrender";
        $player->hasLost();
    }
}

?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <link href="style.css" type="text/css" rel="stylesheet">


    <title>php-blackjack</title>
</head>
<body>
<div class="miro">
    <form method="POST" action="index.php" ">
        <button class="btn border-primary" type="submit" id="hit" value="Hit" name="hit">Hit</button>
        <button class="btn border-primary" type="submit" id="stand" value="Stand" name="stand">stand</button>
        <button class="btn border-primary" type="submit" id="surrender" value="Surrender" name="surrender">Surrender</button>

    </form>
</div>
<div class="miro">
   <h1>Player cards:</h1>
    <section class="cards">
        <?php
        foreach($player->getCards() as $card){
            echo $card->getUnicodeCharacter(true);
        }
        ?>
    </section>

</div>

<div class="miro">
  <h1> Dealer cards:</h1>
    <section class="cards">
        <?php
        foreach($dealer->getCards() as $card){
            echo $card->getUnicodeCharacter(true);
        }
        ?>
    </section>
</div>

<div class="miro">
    <?php
    if ($dealer->hasLost()){
        echo "Dealer loses";
    } else if($player->hasLost()){
        echo "Player loses";
    }
    ?>
</div>
</body>
