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
 * Class Train - Train Transportation Card
 * @package CORE\Card
 */
class Train extends Card
{
    /**
     * Not encapsulated coz of reason of simplicity....
     */

    /**
     * Train number
     * @var string
     */
    public $number;

    /**
     * @var string
     */
    public $seat;
}