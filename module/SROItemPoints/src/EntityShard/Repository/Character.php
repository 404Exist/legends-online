<?php

namespace PServerCMS\SROItemPoints\EntityShard\Repository;

class Character extends \GameBackend\Entity\SRO\Shard\Repository\Character
{
    /**
     * @param array $jidList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopCharacter(array $jidList = [])
    {
        $query = parent::getTopCharacter($jidList);

        $query->resetDQLPart('orderBy');
        $query->orderBy('p.itemPoints', 'desc');

        return $query;
    }

    /**
     * @param int[] $jidList
     *
     * @return array
     */
    public function getTopCharacterSitemap(array $jidList = []): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p.id as id')
            ->where('p.deleted = 0')
            ->andWhere('p.id > 0')
            ->orderBy('p.itemPoints', 'desc')
            ->setMaxResults(10000);

        if ($jidList) {
            $queryBuilder->join('p.user', 'user')
                ->andWhere('user.jid NOT IN (:jidList)')
                ->setParameter('jidList', $jidList);
        }

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_SCALAR);
    }
}