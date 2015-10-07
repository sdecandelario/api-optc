<?php

namespace OptcRestApi\Components\Character\Entity;

use OptcRestApi\Components\Character\Model\Interfaces\CharacterInterface;
use OptcRestApi\Components\Core\Abstracts\AbstractEntity;

/**
 * Character.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class Character extends AbstractEntity implements CharacterInterface
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
