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
     *  You need to supply it as a single permission string format
     */
    'permissions' => [
        'download' => null,
        'create_backup' => null,
        'backup_list' => null,
    ],
    /*
     *  Backup Options
     *
     *  This is how the Laravel Backup will backup based on the option you selected
     *  -----
     *  Options:
     *  null - This will only back up the Database and the System
     *  db - This will only back up the Database
     *  system - This will back up the system, and it will not include the DB.
     *  -----
     *   You need to supply it as string format
     */
    'options' => null,
    /*
     *  Backup Filename
     *  ----
     *  The backup filename will be appended with a Date-Time and options to be able to distinguish the recent backup
     */
    'filename' => env('APP_NAME'),
    /*
     *  Disable Backup Notification
     *
     */
    'disable_notification' => true,
    /*
     * Enable OS Signal Handling
     */
    'disable_signal' => true,
    /*
     *  Queue
     * -----
     *  Queue to use for the jobs to run through.
     */
    'queue' => null,


];
