<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class TimeService extends Facade
{
    protected static function getFacadeAccessor()
    {
        // Return key of service in service-container.
        return 'currentTime';
    }

}
