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
     *
     *  This permission set will be used for checking the authorized user if the user have an ability
     *  to create backup, download backup, or view any backup
     *
     *  If the Permission set is blank, any authorized request will be granted for the action.
     *  -------
     *  You need to put permission needed by the user.
     */
    'permissions' => [
        'download' => [],
        'create_backup' => [],
        'backup_list' => []
    ],

];
