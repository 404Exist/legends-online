<?php

namespace PServerPanel\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class VoteSites extends EntityRepository
{

    /**
     * @return \PServerPanel\Entity\VoteSites[]|null
     */
    public function getVoteSites()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.active = 1')
            ->orderBy('p.sortKey', 'asc')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param            $id
     * @param bool|false $ignoreActive
     * @return \PServerPanel\Entity\VoteSites|null
     */
    public function getVoteSite4Id($id, $ignoreActive = false)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->setMaxResults(1);

        if (!$ignoreActive) {
            $query->andWhere('p.active = 1');
        }

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.created', 'desc');
    }
}