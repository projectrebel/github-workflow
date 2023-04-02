<?php

namespace ProjectRebel\GithubWorkflow\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GithubWorkflowCommand extends Command
{
    public $signature = 'github-workflow:install';

    public $description = 'Installs the Github Workflow';

    public $path;
    public $phpVersion;
    public $packagePath = 'vendor/projectrebel/github-workflow/src/';

    public function handle(): int
    {
        $this->path = base_path('.github/workflows');

        if (!File::exists($this->path)) {
            File::makeDirectory($this->path, 0755, true);
        }

        $this->phpVersion = $this->anticipate('What PHP version would you like to use?', ['8.0']);

        $this->publishPullRequestTemplate();
        $this->publishChecksFile();
        $this->publishStagingDeployFile();
        $this->publishProductionDeployFile();
        $this->publishPullRequestFile();
        $this->publishLarastanConfigurationFile();
        $this->publishTestConfigurationFile();

        $this->info('Workflow installed!');
        return self::SUCCESS;
    }

    public function publishPullRequestTemplate()
    {
        $url = $this->ask('What URL would you like to use in the Github pull request template?');
        $template = file_get_contents('/Users/nolan/Sites/ProjectRebel/github-workflow/src/stubs/PULL_REQUEST_TEMPLATE.stub');
        $template = str_replace('{ticket-url-placeholder}', $url, $template);
        File::put(base_path('.github/PULL_REQUEST_TEMPLATE.md'), $template);

        $this->line('Pull request template published!');
    }

    public function publishChecksFile()
    {
        $template = file_get_contents(base_path($this->packagePath . 'stubs/ci-checks.stub'));
        $template = str_replace('{php-version}', $this->phpVersion, $template);
        File::put(base_path('/.github/workflows/ci-checks.yml'), $template);

        $this->line('Checks file published!');
    }

    public function publishStagingDeployFile()
    {
        $trunkName = $this->anticipate('What is the name of your trunk branch?', ['main', 'master', 'production']);
        $template = file_get_contents(base_path($this->packagePath . 'stubs/staging-deploy.stub'));
        $template = str_replace('{trunk-name}', $trunkName, $template);
        $template = str_replace('{php-version}', $this->phpVersion, $template);
        File::put(base_path('/.github/workflows/staging-deploy.yml'), $template);

        $this->line('Deploy file published!');
    }

    public function publishProductionDeployFile()
    {
        $template = file_get_contents(base_path($this->packagePath . 'stubs/production-deploy.stub'));
        $template = str_replace('{php-version}', $this->phpVersion, $template);
        File::put(base_path('/.github/workflows/production-deploy.yml'), $template);

        $this->line('Deploy file published!');
    }

    public function publishPullRequestFile()
    {
        $template = file_get_contents(base_path($this->packagePath . 'stubs/pull-request.stub'));
        $template = str_replace('{php-version}', $this->phpVersion, $template);
        File::put(base_path('/.github/workflows/pull-request.yml'), $template);

        $this->line('Pull request file published!');
    }

    public function publishLarastanConfigurationFile()
    {
        if (!File::exists(base_path('phpstan.neon'))) {
            $template = file_get_contents(base_path($this->packagePath . 'stubs/phpstan.stub'));
            File::put(base_path('phpstan.neon'), $template);
            $this->line('Larastan configuration file published!');
        }
    }

    public function publishTestConfigurationFile()
    {
        if (!File::exists(base_path('phpunit-ci.xml'))) {
            $template = file_get_contents(base_path($this->packagePath . 'stubs/phpunit-ci.stub'));
            File::put(base_path('phpunit-ci.xml'), $template);
            $this->line('PHPUnit CI configuration file published!');
        }
    }
}
