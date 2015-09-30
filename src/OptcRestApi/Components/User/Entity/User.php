<?php

namespace OptcRestApi\Components\User\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use OptcRestApi\Components\User\Model\Interfaces\UserInterface;

/**
 * User.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class User extends BaseUser implements UserInterface
{
    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $surnames;
    /**
     * @var
     */
    private $city;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurnames()
    {
        return $this->surnames;
    }

    /**
     * @param mixed $surnames
     */
    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }
}
