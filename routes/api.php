<?php
use \Illuminate\Support\Facades\Route;
use \MarJose123\LaravelBackupApi\Http\Controllers\BackupApiController;

Route::middleware(config('backup-api.middleware'))
    ->prefix(config('backup-api.route_prefix'))
    ->name(config('backup-api.route_name_prefix'))
    ->group(function (){
        /*
         * Creating a back-up
         */
        Route::post('/create', [BackupApiController::class, 'createBackup'])
                ->name('create-backup');
        /*
         * Retrieve Back-up Disk Destination information
         */
        Route::get('/backup/disks', [BackupApiController::class, 'diskIndex'])
            ->name('disks.index');
        /*
         * Retrieve Back-up information
         */
        Route::get('/backup', [BackupApiController::class, 'backupIndex'])
            ->name('index');
        /*
         * Download the backup data
         */
        Route::get('/download/{id}', [BackupApiController::class, 'download'])
            ->name('download');

});
