<?php

return [

    /*
     *  Middleware
     *  Link: https://laravel.com/docs/10.x/routing#route-group-middleware
     */
    'middleware' => [
        'auth:sanctum',
    ],
    /*
     *  Route Name Prefixes
     *  Link: https://laravel.com/docs/10.x/routing#route-group-name-prefixes
     */
    'route_name_prefix' => 'api.backup.',
    /*
     *  Route Prefixes
     *  Link: https://laravel.com/docs/10.x/routing#route-group-prefixes
     */
    'route_prefix' => 'backup',
    /*
     *  Controller Permission
     */
    'permission' => [],

];
