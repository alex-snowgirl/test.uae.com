<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:26 PM
 */
namespace CORE\TripBuilder\Strategy;

use CORE\Card;
use CORE\TripBuilder\Strategy;

/**
 * Class Easy
 * @package CORE\TripBuilder\Strategy
 */
class Easy extends Strategy
{
    /**
     * @param Card[] $cards
     * @return Card[]
     */
    public function process(array $cards)
    {
        $from2To = array();
        $from2Card = array();

        array_walk($cards, function (Card $card) use (&$from2To, &$from2Card) {
            $from2To[$card->from] = $card->to;
            $from2Card[$card->from] = $card;
        });

        //we expected non-broken chain... (@todo validations...)
        $first = array_diff(array_keys($from2To), $from2To);

        $last = array_values($first)[0];

        $output = array();

        for ($i = 0, $s = sizeof($from2Card); $i < $s; $i++) {
            $output[] = $from2Card[$last];
            $last = $from2Card[$last]->to;
        }

        return $output;
    }
}