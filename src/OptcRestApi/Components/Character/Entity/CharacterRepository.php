<?php

namespace OptcRestApi\Components\Character\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CharacterRepository.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class CharacterRepository extends EntityRepository
{
    public function findAll()
    {
        $builder = $this
            ->createQueryBuilder('c')
            ->addSelect('c')
        ;

        return $builder;
    }
}
