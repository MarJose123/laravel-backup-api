<?php

namespace MarJose123\LaravelBackupApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarJose123\LaravelBackupApi\LaravelBackupApi
 */
class LaravelBackupApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MarJose123\LaravelBackupApi\LaravelBackupApi::class;
    }
}
