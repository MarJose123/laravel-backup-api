<?php

namespace MarJose123\LaravelBackupApi\Http\Controllers;

use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Storage;
use MarJose123\LaravelBackupApi\Jobs\CreateBackupJob;
use MarJose123\LaravelBackupApi\Models\BackupDestination;
use MarJose123\LaravelBackupApi\Models\BackupDestinationStatus;

class BackupApiController
{
    use ApiResponseHelpers;

    public function createBackup()
    {
        /*
         * Check Authenticated User Permissions
         */
        $this->verifyPermission();

        /*
         * Process the request to create a backup
         */
        dispatch(new CreateBackupJob())
            ->onQueue(config('backup-api.queue'))
            ->afterResponse();

        return $this->respondOk('Creating a new backup in background. Check the list Backup to get the recent backup');

    }

    public function backupIndex()
    {
        /*
        * Check Authenticated User Permissions
        */
        $this->verifyPermission();

        return $this->respondWithSuccess(BackupDestination::query()->get());

    }

    public function diskIndex()
    {
        /*
        * Check Authenticated User Permissions
        */
        $this->verifyPermission();

        return $this->respondWithSuccess(BackupDestinationStatus::query()->get());

    }

    public function download(BackupDestination $record)
    {
        /*
        * Check Authenticated User Permissions
        */
        $this->verifyPermission();

        return Storage::disk($record->disk)->download($record->path);

    }

    private function verifyPermission()
    {
        if (! is_null(config('backup-api.permissions.create_backup')) && auth()->user()->cannot(config('backup-api.permissions.create_backup'))) {
            return $this->respondForbidden('You don\'t have a permission to create system/database backup.');
        }
    }
}
