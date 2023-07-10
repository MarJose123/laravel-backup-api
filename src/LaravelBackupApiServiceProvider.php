<?php

namespace MarJose123\LaravelBackupApi;

use MarJose123\LaravelBackupApi\Commands\LaravelBackupApiCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelBackupApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-backup-api')
            ->hasConfigFile()
            ->hasRoute('api');
        //            ->hasMigration('create_laravel-backup-api_table')
        //            ->hasCommand(LaravelBackupApiCommand::class);
    }
}
