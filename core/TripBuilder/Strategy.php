<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:14 PM
 */
namespace CORE\TripBuilder;

use CORE\Card;
use CORE\Helper\FactoryFromString;

/**
 * @todo some strategy might goes here...
 * @todo ...and could be passed inside TripBuilder::process
 * @todo ..might but won't :) coz this is a test project and I have 2 hours only
 * Class Strategy - Holds Card List Sorting strategy..
 * @package CORE\TripBuilder
 * @static Strategy factoryFromString
 */
abstract class Strategy
{
    use FactoryFromString;

    /**
     * @param Card[] $cards
     * @return Card[]
     */
    abstract public function process(array $cards);
}