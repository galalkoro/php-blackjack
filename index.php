<?php


// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

require_once 'codes/Blackjack.php';
require_once 'codes/Player.php';


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
    if ($_POST["name"]== "Hit"){
        echo "Player hit";
    }
    elseif ($_POST["name"]== "Stand"){
        echo "player stand";
    }
    elseif ($_POST["name"]== "Surrender"){
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

<div class="container">
    <div class="row center-xs center-sm center-md center-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        </div>
    </div>
    <h2>BlackJack</h2>
    <p>PHP OOP</p>

    <!-- ICON ROW 1 -->
    <div class="row center-xs center-sm center-md center-lg">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 cards" >

            <h4>Player cards:</h4>
            <p>
                <?php
                foreach($player->getCards() as $card){
                    echo $card->getUnicodeCharacter(true);
                }
                ?>
            </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 cards">
            <h4>Dealer cards</h4>
            <p>
                <?php
                foreach($dealer->getCards() as $card){
                    echo $card->getUnicodeCharacter(true);
                }
                ?>

            </p>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
            <h4>Winner Score</h4>
            <p>
                <?php
                if ($dealer->hasLost()){
                    echo "Dealer loses";
                }
                 elseif($player->hasLost()){
                    echo "Player loses";
                }
                ?>
            </p>

        </div>


        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="reset">
            <form method="POST" action="index.php" ">
            <button class="btn border-primary" type="submit" id="hit" value="Hit" name="hit">Hit</button>
            <button class="btn border-primary" type="submit" id="stand" value="Stand" name="stand">stand</button>
            <button class="btn border-primary" type="submit" id="surrender" value="Surrender" name="surrender">Surrender</button>
            <button class="btn border-primary" type="submit" id="reset" value="reset" name="name">reset</button>
            </form>
        </div>
    </div>

</body>
