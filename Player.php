<?php
//Create a class called Player in the file Player.php.
//Add 2 private properties: cards (array), lost (bool, default = false)
class Player {
    //two private properties
    private array $cards = [];
    private bool $lost = false;

    //constructor to require deck object, and then passing deck from the blackjack.
    // two cards for player that exist from the deck class.
    public function __construct(Deck $deck)
    {
        for($i = 0; $i < 2; $i++){
            $this->cards[] = $deck->drawCard();
        }
    }

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
    public function hit($deck)
    {
        $this->cards[] = $deck->drawCard();
        if ($this->getCards()>21){
            $this->hasLost();
        }
        return $this->cards;
    }

    //surrender empty method
    public function surrender()
    {
        $this->hasLost();
    }

    //getScore empty method
    public function getScore()
    {
        $score = 0;
        foreach ($this->cards as $card){
            $score += $card;
        }
        return $score;
    }

    //hasLost empty method
    public function hasLost()
    {
        return $this->lost = true;
    }
}
