<?php

use function Pest\Laravel\artisan;
use Illuminate\Support\Facades\File;
use ProjectRebel\GithubWorkflow\Commands\GithubWorkflowCommand;

it('runs', function () {
    artisan(GithubWorkflowCommand::class)->assertExitCode(0);
});

it('outputs finished message', function () {
    artisan(GithubWorkflowCommand::class)->expectsOutput('Workflow installed!');
});
