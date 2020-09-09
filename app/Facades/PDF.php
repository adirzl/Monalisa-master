<?php
/**
 * Created by PhpStorm.
 * User: I816
 * Date: 25/06/2019
 * Time: 10:39
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class PDF extends IlluminateFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'dompdf.wrapper'; }

    /**
     * Resolve a new instance
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::$app->make(static::getFacadeAccessor());

        switch (count($args))
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }


}
