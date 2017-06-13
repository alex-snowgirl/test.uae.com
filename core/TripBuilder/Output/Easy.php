<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:26 PM
 */
namespace CORE\TripBuilder\Output;

use CORE\Card;
use CORE\TripBuilder\Output;

use CORE\Card\Train;
use CORE\Card\Plane;
use CORE\Card\Bus;

/**
 * Class Easy
 * @package CORE\TripBuilder\Output
 */
class Easy extends Output
{
    /**
     * List processor...
     *
     * @param Card[] $cards
     * @return string
     */
    public function process(array $cards)
    {
        $output = array();

        $s = sizeof($cards);

        foreach ($cards as $i => $card) {
            $output[] = join('', array(
                ($i + 1) . '. ',
                $card->output($this)
            ));
        }

        $output[] = ($s + 1) . '. You have arrived at your final destination.';

        return nl2br(join("\r\n", $output));
    }

    /**
     * Step processor...
     *
     * @TODO!!! This method should works with abstractions... (Open-Closed principle)
     * @todo ...to achieve this - need to create and implement all pairs <Transport>-Easy Output...
     * @todo ... left it as is - coz need to hurry up and made it in time...
     * @param Card $card
     * @return string
     */
    public function processStep(Card $card)
    {
        switch (true) {
            case $card instanceof Train:
                return sprintf('Take train %s from %s to %s. Sit in seat %s.',
                    $card->number, $card->from, $card->to, $card->seat);
            case $card instanceof Bus:
                //@todo no seat output in case of !$card->seat... (or considers our Bus  == Airport Bus - then no problems...)
                return sprintf('Take the airport bus from %s to %s. No seat assignment.',
                    $card->from, $card->to, $card->seat);
            case $card instanceof Plane:
                return sprintf("From %s, take flight %s to %s. Gate %s, seat %s.\r\n%s.",
                    $card->from, $card->number, $card->to, $card->gate, $card->seat,
                    $card->baggage
                        ? sprintf('Baggage drop at ticket counter %s',$card->baggage)
                        : 'Baggage will we automatically transferred from your last leg');
            default:
                return '';
        }
    }
}