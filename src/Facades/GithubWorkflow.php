<?php

namespace ProjectRebel\GithubWorkflow\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ProjectRebel\GithubWorkflow\GithubWorkflow
 */
class GithubWorkflow extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ProjectRebel\GithubWorkflow\GithubWorkflow::class;
    }
}
