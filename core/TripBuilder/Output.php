<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:43 PM
 */
namespace CORE\TripBuilder;

use CORE\Card;
use CORE\Helper\FactoryFromString;

/**
 * Class Output - Holds Card List output format strategy..
 * @package CORE\TripBuilder
 * @static Output factoryFromString
 */
abstract class Output
{
    use FactoryFromString;

    /**
     * @param array $cards
     * @return string
     */
    abstract public function process(array $cards);

    /**
     * @param Card $card
     * @return string
     */
    abstract public function processStep(Card $card);
}