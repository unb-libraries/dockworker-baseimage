<?php

namespace Dockworker\Robo\Plugin\Commands;

use Dockworker\DockworkerBaseImageCommands;
use Dockworker\IO\DockworkerIOTrait;
use Dockworker\Twig\TwigTrait;

/**
 * Provides commands for building the application's theme assets.
 */
class BaseImageGitHubWorkflowFilesCommands extends DockworkerBaseImageCommands
{
    use DockworkerIOTrait;
    use TwigTrait;

    /**
     * Write the default GitHub Actions workflow files for Base Images.
     *
     * @hook replace-command github:workflows:write-default
     */
    public function writeBaseImageWorkflowFiles(): void
    {
        $this->initOptions();
        $this->initDockworkerIO();
        $this->dockworkerIO->title('Writing Workflow Files');

        $workflow_dir = $this->initGetPathFromPathElements(
            [
                $this->applicationRoot,
                '.github/workflows',
            ]
        );

        $this->writeTwig(
            $workflow_dir . '/build-image.yaml',
            'build-image.yaml.twig',
            [
                "$this->applicationRoot/vendor/unb-libraries/dockworker-baseimage/data/workflows/"
            ],
            [
                'image_name' => $this->getRequiredConfigurationItem('dockworker.workflows.image.name'),
            ]
        );
        $this->dockworkerIO->say("Wrote $workflow_dir/build-image.yaml");
    }
}
