<?php
/**
 * Created by PhpStorm.
 * User: I816
 * Date: 25/06/2019
 * Time: 10:39
 */

namespace App\Facades;

class Navbar extends \Illuminate\Support\Facades\Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'Navbar';
    }
}