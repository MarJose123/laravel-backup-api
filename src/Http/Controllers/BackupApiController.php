<?php

namespace MarJose123\LaravelBackupApi\Http\Controllers;

use F9Web\ApiResponseHelpers;
use Illuminate\Support\Facades\Storage;
use MarJose123\LaravelBackupApi\Jobs\CreateBackupJob;
use MarJose123\LaravelBackupApi\Models\BackupDestination;
use MarJose123\LaravelBackupApi\Models\BackupDestinationStatus;
use Symfony\Component\HttpFoundation\Response;

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

        return  response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK ,
            'record_count' => null,
            'message' => 'Creating a new backup in background. Check the list Backup to get the recent backup',
            'data' => null
        ], Response::HTTP_OK );

    }

    public function backupIndex()
    {
        /*
        * Check Authenticated User Permissions
        */
        $this->verifyPermission();
        if(BackupDestination::query()->get()->count() < 0) return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_NO_CONTENT ,
            'record_count' => BackupDestination::query()->get()->count(),
            'message' => 'No available data',
            'data' => null
        ], Response::HTTP_NO_CONTENT );

        return  response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK ,
            'record_count' => BackupDestination::query()->get()->count(),
            'message' => '',
            'data' => BackupDestination::query()->get()
        ], Response::HTTP_OK );

    }

    public function diskIndex()
    {
        /*
        * Check Authenticated User Permissions
        */
        $this->verifyPermission();

        return  response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK ,
            'record_count' => BackupDestinationStatus::query()->get()->count(),
            'message' => '',
            'data' => BackupDestinationStatus::query()->get()
        ], Response::HTTP_OK );

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
