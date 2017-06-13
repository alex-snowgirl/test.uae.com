<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 9:42 PM
 */
namespace CORE\Card;

use CORE\Card;

/**
 * Class Bus - Bus Transportation Card
 * @package CORE\Card
 */
class Bus extends Card
{
    /**
     * Not encapsulated coz of reason of simplicity....
     */

    /**
     * @todo find out if we need this here? does airport buses have seats?
     * @todo ...if so - left it as is, if no - split this class into Bus ans Airport Bus...
     * @var string
     */
    public $seat;
}