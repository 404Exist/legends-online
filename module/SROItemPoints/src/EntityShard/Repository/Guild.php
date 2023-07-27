<?php

namespace PServerCMS\SROItemPoints\EntityShard\Repository;

class Guild extends \GameBackend\Entity\SRO\Shard\Repository\Guild
{
    /**
     * @param array $blackList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopGuild(array $blackList = [])
    {
        $query = parent::getTopGuild($blackList);

        $query->resetDQLPart('orderBy');
        $query->orderBy('p.itemPoints', 'desc');

        return $query;
    }

    /**
     * @param array $blackList
     * @return array
     */
    public function getTopGuildSitemap(array $blackList = []): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p.id')
            ->where('p.id > 0')
            ->orderBy('p.itemPoints', 'desc')
            ->setMaxResults(1000);

        if ($blackList) {
            $queryBuilder->andWhere('p.id not in (:blackList)')
                ->setParameter('blackList', $blackList);
        }

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_SCALAR);
    }

}