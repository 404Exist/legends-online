<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;

class RefMagicOpt extends EntityRepository
{
    /**
     * @return \GameBackend\Entity\SRO\Shard\RefMagicOpt[]|null
     */
    public function getMagicOptList()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.service = :service')
            ->setParameter('service', 1);

        return $query->getQuery()->getResult();
    }
}