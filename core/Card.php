<?php
/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 9:40 PM
 */

namespace CORE;
use CORE\TripBuilder\Output;

/**
 * Class Card - Simple Abstract Transportation Card
 * @package CORE
 */
abstract class Card
{
    /**
     * Common fields goes here...
     * Not encapsulated coz of reason of simplicity....
     */

    /**
     * @var string
     */
    public $from;

    /**
     * @var string
     */
    public $to;

    /**
     * Simple builder
     * @param array $data - key-value pairs for building the object
     */
    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }
    }

    /**
     * @todo validations...
     * @param array $data
     * @return Card
     */
    public static function factory(array $data)
    {
        $class = join('\\', array(
            __CLASS__,
            ucfirst($data['type'])
        ));

        unset($data['type']);

        return new $class($data);
    }

    /**
     * @param array[] $arrayOfData
     * @return Card[]
     */
    public static function factoryMulti(array $arrayOfData)
    {
        return array_map(function (array $data) {
            return static::factory($data);
        }, $arrayOfData);
    }

    public function output(Output $output, Card $next = null)
    {
        return $output->processStep($this, $next);
    }
}