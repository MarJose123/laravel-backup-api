<?php

namespace MarJose123\LaravelBackupApi\Models;

use Illuminate\Database\Eloquent\Model;
use MarJose123\LaravelBackupApi\LaravelBackupApi;
use Sushi\Sushi;


class BackupDestinationStatus extends Model
{
    use Sushi;

    public function getRows(): array
    {
        return LaravelBackupApi::getBackupDestinationStatusData();
    }

}
