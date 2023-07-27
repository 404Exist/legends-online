<?php

namespace PServerCMS\SROUnique\Shard\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class UniqueKillList extends EntityRepository
{
    /**
     * @param int $limit
     * @return \PServerCMS\SROUnique\Shard\Entity\UniqueKillList[]
     */
    public function getLastKills($limit = 5)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'uniqueInfo', 'character')
            ->join('p.uniqueInfo', 'uniqueInfo')
            ->join('p.character', 'character')
            ->orderBy('p.id', 'desc')
            ->setMaxResults($limit)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param int $limit
     * @return \PServerCMS\SROUnique\Shard\Entity\UniqueKillList[]
     */
    public function getLastKills4Char($charId, $limit = 5)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'uniqueInfo', 'character')
            ->join('p.uniqueInfo', 'uniqueInfo')
            ->join('p.character', 'character')
            ->where('p.character = :charId')
            ->setParameter('charId', $charId)
            ->orderBy('p.id', 'desc')
            ->setMaxResults($limit)
            ->getQuery();

        return $query->getResult();
    }
}