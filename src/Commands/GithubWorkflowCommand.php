<?php

namespace ProjectRebel\GithubWorkflow\Commands;

use Illuminate\Console\Command;

class GithubWorkflowCommand extends Command
{
    public $signature = 'github-workflow';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
