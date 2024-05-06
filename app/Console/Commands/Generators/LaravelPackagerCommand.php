<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\confirm;
use Illuminate\Support\Str;

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


    protected $packageName;

    protected $vendor;

    protected $packageNamespace;

    protected $packageSlug;

    protected $authorName;

    protected $authorEmail;

    protected $packageDescription;

    protected $license;

    protected $composer = [];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->packageName = text('Enter package name');

        $this->packageSlug = text('Enter package slug');

        $this->vendor = text('Enter vendor name');

        $this->packageDescription = text('Enter description');

        $this->authorName = text('Enter author name');

        $this->authorEmail = text('Enter author email');

        $confirmed = confirm(
            label: 'Do you confirm the details?',
            default: false,
            yes: 'I accept',
            no: 'I decline',
            hint: 'The terms must be accepted to continue.'
        );

        if ($confirmed) {
            $this->createPackageComposer();
            $this->createPackageClass();
            $this->createPackageFacade();
            $this->createPackageServiceProvider();
            $this->createPackageConfig();
            $this->createPackageComposer();
            $this->createPackageLicesnse();
            $this->createPackageReadme();
            $this->createPackageChangeLog();
            $this->createPackageContributing();
        } else {
            $this->error("Skipping package generartion");
        }
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

        $this->composer = [
            "name" => $this->vendor . "/" . $this->packageSlug,
            "description" => $this->packageDescription,
            "keywords" => [
                0 => $this->vendor,
                1 => $this->packageSlug
            ],
            "homepage" => "https://github.com/" . $this->vendor . "/" . $this->packageSlug,
            "license" => "MIT",
            "type" => "library",
            "authors" => [
                0 => [
                    "name" => $this->authorName,
                    "email" => $this->authorEmail,
                    "role" => "Developer"
                ]
            ],
            "require" => [
                "php" => "^7.4|^8.0",
                "illuminate/support" => "^8.0"
            ],
            "require-dev" => [
                "orchestra/testbench" => "^6.0",
                "phpunit/phpunit" => "^9.0"
            ],
            "autoload" => [
                "psr-4" => [
                    "Ajeyapaul\\Test\\" => "src"
                ]
            ],
            "autoload-dev" => [
                "psr-4" => [
                    Str::studly($this->vendor) . "\\" . Str::studly($this->packageSlug) . "\\Tests\\" => "tests"
                ]
            ],
            "scripts" => [
                "test" => "vendor/bin/phpunit",
                "test-coverage" => "vendor/bin/phpunit --coverage-html coverage"
            ],
            "config" => [
                "sort-packages" => true
            ],
            "extra" => [
                "laravel" => [
                    "providers" => [
                        Str::studly($this->vendor) . "\\" . Str::studly($this->packageSlug) . "\\" . Str::studly($this->packageSlug) . "ServiceProvider"
                    ],
                    "aliases" => [
                        "Test" => Str::studly($this->vendor) . "\\" . Str::studly($this->packageSlug) . "\\" . Str::studly($this->packageSlug) . "Facade"
                    ]
                ]
            ]
        ];
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
