<?php

namespace ProjectRebel\GithubWorkflow;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ProjectRebel\GithubWorkflow\Commands\GithubWorkflowCommand;

class GithubWorkflowServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('github-workflow')
            ->hasCommand(GithubWorkflowCommand::class);
    }
}
