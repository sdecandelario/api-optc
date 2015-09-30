<?php

namespace OptcRestApi\Components\User\Model\Interfaces;

use FOS\UserBundle\Model\UserInterface as BaseUserInterface;

/**
 * UserInterface.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
interface UserInterface extends BaseUserInterface
{
    public function getName();
    public function setName($name);
    public function getSurnames();
    public function setSurnames($surnames);
    public function getCity();
    public function setCity($city);
}
