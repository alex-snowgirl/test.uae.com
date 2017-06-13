<?php

/**
 * Created by PhpStorm.
 * User: snowgirl
 * Date: 6/13/17
 * Time: 10:46 PM
 */
namespace CORE\Helper;

/**
 * Just so... for visibility of traits knowledge
 * Class FactoryFromString
 * @package CORE\Helper
 */
trait FactoryFromString
{
    /**
     * @todo validations...
     *
     * @param $classGlue
     * @return object
     */
    public static function factoryFromString($classGlue)
    {
        $class = join('\\', array(
            __CLASS__,
            ucfirst($classGlue)
        ));

        return new $class();
    }
}