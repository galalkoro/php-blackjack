<?php
//Create a class called Player in the file Player.php.
//Add 2 private properties: cards (array), lost (bool, default = false)
class Player {
    //two private properties
    private array $cards = [];
    private bool $lost = false;


    //constructor to require deck object, and then passing deck from the blackjack.
    // two cards for player that exist from the deck class.


    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @return bool
     */
    public function isLost(): bool
    {
        return $this->lost;
    }


    //hit empty method
    public function hit()
    {

    }

    //surrender empty method
    public function surrender()
    {

    }

    //getScore empty method
    public function getScore()
    {

    }


    //hasLost empty method
    public function hasLost()
    {
        return $this->lost = true;

    }

}