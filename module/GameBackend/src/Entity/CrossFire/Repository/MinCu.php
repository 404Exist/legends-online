<?php

namespace GameBackend\Entity\CrossFire\Repository;

use Doctrine\ORM\EntityRepository;

class MinCu extends EntityRepository
{

    /**
     * @return int
     */
    public function getCurrentOnlinePlayer()
    {
        $query = $this->createQueryBuilder('p')
            ->select('SUM(p.connections)')
            ->where('p.connections > :connections')
            ->setParameter('connections', 0)
            ->getQuery();

        return (int)$query->getSingleScalarResult();
    }
}