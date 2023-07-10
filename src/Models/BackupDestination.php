<?php

namespace MarJose123\LaravelBackupApi\Models;

use Illuminate\Database\Eloquent\Model;
use MarJose123\LaravelBackupApi\LaravelBackupApi;
use Sushi\Sushi;

class BackupDestination extends Model
{
    use Sushi;

    public function getRows(): array
    {
        $data = [];

        foreach (LaravelBackupApi::getDisks() as $disk) {
            $data = array_merge($data, LaravelBackupApi::getBackupDestinationData($disk));
        }

        return $data;
    }

}
