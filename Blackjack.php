<?php

namespace Blackjack;

class Blackjack
{
private player $player;
private dealer $dealer;
private deck $deck;

    /**
     * @return player
     */
    public function getPlayer(): player
    {
        return $this->player;
    }

    /**
     * @return dealer
     */
    public function getDealer(): dealer
    {
        return $this->dealer;
    }

    /**
     * @return deck
     */
    public function getDeck(): deck
    {
        return $this->deck;
    }
}