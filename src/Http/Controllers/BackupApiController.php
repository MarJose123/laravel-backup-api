<?php

namespace MarJose123\LaravelBackupApi\Http\Controllers;

use F9Web\ApiResponseHelpers;
use Illuminate\Http\Request;

class BackupApiController
{
    use ApiResponseHelpers;

    public function createBackup(Request $request)
    {
        /*
         *  Check Authenticated User Permissions
         */
        if (! is_null(config('backup-api.permissions.create_backup')) && $request->user()->cannot(config('backup-api.permissions.create_backup'))) {
            return $this->respondForbidden('You don\'t have a permission to create system/database backup.');
        }

        /*
         *  Process the request to create a backup
         */

    }
}
