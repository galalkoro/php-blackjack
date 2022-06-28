<?php

require 'Card.php';
require  'Deck.php';
require 'Suit.php';

class Blackjack
{
private player $player;
private Player $dealer;
private deck $deck;

    public function __construct()
    {
        $deck = new Deck();
        $deck->shuffle();

       /* foreach ($deck->getCards() as $card){
            echo $card->getUnicodeCharacter(true);
            echo '<br>';
        }*/

        $this->player = new Player($deck);
        $this->dealer = new Player($deck);
    }

    /**
     * @return player
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return dealer
     */
    public function getDealer()
    {
        return $this->dealer;
    }

    /**
     * @return deck
     */
    public function getDeck()
    {
        return $this->deck;
    }
}



?>