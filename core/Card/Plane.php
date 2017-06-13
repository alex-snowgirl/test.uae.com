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
 * Class Plane - Plane Transportation Card
 * @package CORE\Card
 */
class Plane extends Card
{
    /**
     * Not encapsulated coz of reason of simplicity....
     */

    /**
     * Flight number
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $gate;

    /**
     * @var string
     */
    public $seat;

    /**
     * @var integer
     */
    public $baggage;
}