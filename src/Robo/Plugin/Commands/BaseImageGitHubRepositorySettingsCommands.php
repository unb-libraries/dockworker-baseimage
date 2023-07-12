<?php

namespace Dockworker\Robo\Plugin\Commands;

use Dockworker\DockworkerBaseImageCommands;

/**
 * Provides methods for generating repository topics for Base Images in GitHub.
 */
class BaseImageGitHubRepositorySettingsCommands extends DockworkerBaseImageCommands
{
    /**
     * Provides repository topics for Base Images in GitHub.
     *
     * @hook on-event dockworker-github-topics
     *
     * @return string[]
     *   The repository topics.
     */
    public function provideGitHubRepositoryTopics(): array
    {
        return [
            'dockworker-baseimage',
        ];
    }
}
