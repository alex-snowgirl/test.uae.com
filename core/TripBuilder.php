<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:09 PM
 */
namespace CORE;

use CORE\TripBuilder\Strategy as TripBuilderStrategy;

/**
 * @todo rename... (class and namespace - pick up more appropriate... with Card glue...)
 * Class TripBuilder
 * @package CORE
 */
class TripBuilder
{
    protected $cards;

    /**
     * @param Card[] $cards
     */
    public function __construct(array $cards)
    {
        array_walk($cards, function (Card $card) {
            $this->addCard($card);
        });
    }

    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * Simple executor
     * Strategy param - just for following Open-Closed & Liskov principles
     * (i do not have a clue how to sort it with another algo yet...)
     * @todo or we could event use TripBuilder as core class for strategies... (extends instead of bridges..)
     * @todo ..as for me - this is more flexible (we could change abstractions separately in future...)
     * @param TripBuilderStrategy $strategy
     * @return Card[]
     */
    public function processWith(TripBuilderStrategy $strategy)
    {
        //@todo some additional stuff goes here..
        $output = $strategy->process($this->cards);
        //@todo some additional stuff goes here..
        //@todo or we could even cache results or do whatever we want...
        //@todo ...depends on BL and requirements...
        return $output;
    }
}