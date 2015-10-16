<?php

namespace OptcRestApi\Bundles\RESTBundle\Service;

use Doctrine\ORM\EntityManager;
use JMS\Serializer\Serializer;
use Orbitale\Component\EntityMerger\EntityMerger;

/**
 * ExtenderEntityMerger.
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class ExtenderEntityMerger
{
    private $entityMerger;

    public function __construct(Serializer $serializer, EntityManager $em)
    {
        $this->entityMerger = new EntityMerger($em, $serializer);
    }

    public function mergeEntities($destiny, $origin)
    {
        return $this->entityMerger->merge($destiny, $origin);
    }
}
