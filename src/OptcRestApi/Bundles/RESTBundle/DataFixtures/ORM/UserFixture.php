<?php

namespace OptcRestApi\Bundles\RESTBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * UserFixture.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class UserFixture extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager.
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');

        $userAdmin = $userManager->createUser();

        $userAdmin->setUsername('admin');
        $userAdmin->setName('admin');
        $userAdmin->setEmail('admin@example.com');
        $userAdmin->setPlainPassword('1234');
        $userAdmin->setEnabled(true);

        $manager->persist($userAdmin);
        $manager->flush();
    }

    /**
     * Get the order of this fixture.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
