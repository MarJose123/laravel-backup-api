<?php

namespace MarJose123\LaravelBackupApi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use MarJose123\LaravelBackupApi\Jobs\CreateBackupJob;
use MarJose123\LaravelBackupApi\Models\BackupDestination;
use MarJose123\LaravelBackupApi\Models\BackupDestinationStatus;
use Symfony\Component\HttpFoundation\Response;

class BackupApiController
{
    public function createBackup()
    {
        /*
         * Check Authenticated User Permissions
         */
        if (! Auth::user()->can(config('backup-api.permissions.create_backup'))) {
            return response()->json([
                'status' => 'failed',
                'status_code' => Response::HTTP_FORBIDDEN,
                'message' => 'You don\'t have a permission to create system/database backup.',
            ], Response::HTTP_FORBIDDEN);
        }

        /*
         * Process the request to create a backup
         */
        dispatch(new CreateBackupJob())
            ->onQueue(config('backup-api.queue'))
            ->afterResponse();

        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'record_count' => null,
            'message' => 'Creating a new backup in background. Check the list Backup to get the recent backup',
            'data' => null,
        ], Response::HTTP_OK);

    }

    public function backupIndex()
    {
        /*
        * Check Authenticated User Permissions
        */
        if (! Auth::user()->can(config('backup-api.permissions.backup_list'))) {
            return response()->json([
                'status' => 'failed',
                'status_code' => Response::HTTP_FORBIDDEN,
                'message' => 'You don\'t have a permission to view any system/database backup.',
            ], Response::HTTP_FORBIDDEN);
        }

        if (BackupDestination::query()->get()->count() < 0) {
            return response()->json([
                'status' => 'success',
                'status_code' => Response::HTTP_NO_CONTENT,
                'record_count' => BackupDestination::query()->get()->count(),
                'message' => 'No available data',
                'data' => null,
            ], Response::HTTP_NO_CONTENT);
        }

        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'record_count' => BackupDestination::query()->get()->count(),
            'message' => '',
            'data' => BackupDestination::query()->get(),
        ], Response::HTTP_OK);

    }

    public function diskIndex()
    {
        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_OK,
            'record_count' => BackupDestinationStatus::query()->get()->count(),
            'message' => '',
            'data' => BackupDestinationStatus::query()->get(),
        ], Response::HTTP_OK);

    }

    public function download(Request $request, string $id)
    {
        /*
        * Check Authenticated User Permissions
        */
        if (! Auth::user()->can(config('backup-api.permissions.backup_list'))) {
            return response()->json([
                'status' => 'failed',
                'status_code' => Response::HTTP_FORBIDDEN,
                'message' => 'You don\'t have a permission to download system/database backup.',
            ], Response::HTTP_FORBIDDEN);
        }

        $record = BackupDestination::query()->where('id', $id)->first();
        if ($record) {
            return Storage::disk($record->disk)->download($record->path);
        }

        return response()->json([
            'status' => 'success',
            'status_code' => Response::HTTP_NO_CONTENT,
            'record_count' => 0,
            'message' => 'Invalid backup ID.',
            'data' => null,
        ], Response::HTTP_NO_CONTENT);

    }
}
