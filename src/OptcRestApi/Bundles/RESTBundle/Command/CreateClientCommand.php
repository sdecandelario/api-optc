<?php

namespace OptcRestApi\Bundles\RESTBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * CreateClientCommand.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class CreateClientCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('oauth:create:client')
            ->setDescription('Create a OAuth client')
            ->addOption(
                'redirect-uris',
                null,
                InputOption::VALUE_NONE,
                'The URIs to redirect, separated by pipe'
            )
            ->addOption(
                'grant-types',
                null,
                InputOption::VALUE_REQUIRED,
                'The grant types, separated by pipe',
                'password|refresh_token|client_credentials'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $redirectUris = explode('|', $input->getOption('redirect-uris'));
        $grantTypes = explode('|', $input->getOption('grant-types'));

        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');
        $client = $clientManager->createClient();
        $client->setRedirectUris($redirectUris);
        $client->setAllowedGrantTypes($grantTypes);
        $clientManager->updateClient($client);

        $client->getPublicId();
        $client->getSecret();

        $output->writeln("{$client->getId()} - {$client->getSecret()}");
    }
}
