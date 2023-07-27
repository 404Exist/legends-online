<?php

namespace GameBackend\Entity\SRO\Account\Repository;

use Doctrine\ORM\EntityRepository;

class Capacity extends EntityRepository
{
    public function getCurrentPlayerOnline()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.id', 'desc')
            ->setMaxResults(1)
            ->getQuery();

        $data = $query->getOneOrNullResult();
        return $data ? $data->getCountPlayer() : 0;
    }
}