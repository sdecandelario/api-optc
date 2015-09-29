<?php

namespace OptcRestApi\Components\Core\Abstracts;

use OptcRestApi\Components\Core\Model\Interfaces\IdentifiableInterface;

/**
 * AbstractContent.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
abstract class AbstractEntity implements IdentifiableInterface
{
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
