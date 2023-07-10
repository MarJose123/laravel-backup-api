<?php

namespace MarJose123\LaravelBackupApi\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class CreateBackupJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $option;

    public function __construct()
    {
         $this->option = config('backup-api.options');
    }

    public function handle(): void
    {
        $backupJob = BackupJobFactory::createFromArray(config('backup'));

        if($this->option === 'db') $backupJob->dontBackupFilesystem();
        if($this->option === 'system') $backupJob->dontBackupDatabases();
        if(config('backup-api.disable_notification')) $backupJob->disableNotifications();
        if(config('backup-api.disable_signal')) $backupJob->disableSignals();

        $backupJob->setFilename($this->option.'-'.date('Y-m-d-H-i-s').'.zip');

        $backupJob->run();

    }
}
