<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\Command;

class LaravelPackagerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'packager:make-laravel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to create a package for laravel';

    protected $vendor;

    protected $packageName;

    protected $packageNamespace;

    protected $packageSlug;

    protected $authorName;

    protected $authorEmail;

    protected $packageDescription;

    protected $license;

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->createPackageClass();
        $this->createPackageFacade();
        $this->createPackageServiceProvider();
        $this->createPackageConfig();

        $this->createPackageComposer();

        $this->createPackageLicesnse();
        $this->createPackageReadme();
        $this->createPackageChangeLog();
        $this->createPackageContributing();
    }

    public function createPackageClass()
    {
        // Logic to create package class
    }

    public function createPackageFacade()
    {
        // Logic to create package facade
    }

    public function createPackageServiceProvider()
    {
        // Logic to create package service provider
    }

    public function createPackageConfig()
    {
        // Logic to create package config
    }

    public function createPackageComposer()
    {
        // Logic to create package composer file
    }

    public function createPackageLicense()
    {
        // Logic to create package license file
    }

    public function createPackageReadme()
    {
        // Logic to create package README file
    }

    public function createPackageChangeLog()
    {
        // Logic to create package change log file
    }

    public function createPackageContributing()
    {
        // Logic to create package contributing file
    }

    public function createPackageLicesnse()
    {
        // Logic to create package contributing file
    }
}
