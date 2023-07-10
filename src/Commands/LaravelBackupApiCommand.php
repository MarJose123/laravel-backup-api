<?php

namespace MarJose123\LaravelBackupApi\Commands;

use Illuminate\Console\Command;

class LaravelBackupApiCommand extends Command
{
    public $signature = 'laravel-backup-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
