<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;

class Guild extends EntityRepository
{
    /**
     * @param       $id
     * @param array $blackList
     * @return \GameBackend\Entity\SRO\Shard\Guild|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getGuild4Id($id, array $blackList = [])
    {
        $query = $this->createQueryBuilder('p')
            ->select()
            ->leftJoin('p.alliance', 'alliance')
            ->leftJoin('alliance.masterGuild', 'masterGuild')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->andWhere('p.id > 0')
            ->setMaxResults(1);

        if ($blackList) {
            $query->andWhere('p.id not in (:blackList)')
                ->setParameter('blackList', $blackList);
        }

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @param array $blackList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopGuild(array $blackList = [])
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'memberList')
            ->where('p.id > 0')
            ->leftJoin('p.memberList', 'memberList')
            ->orderBy('p.level', 'desc');

        if ($blackList) {
            $query->andWhere('p.id not in (:blackList)')
                ->setParameter('blackList', $blackList);
        }

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
            ->orderBy('p.level', 'desc')
            ->setMaxResults(1000);

        if ($blackList) {
            $queryBuilder->andWhere('p.id not in (:blackList)')
                ->setParameter('blackList', $blackList);
        }

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_SCALAR);
    }

    /**
     * @param string $name
     * @param array $blackList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getGuildList(string $name, array $blackList = [])
    {
        $query = $this->getTopGuild($blackList);
        $query->andWhere('p.name LIKE :name')
            ->setParameter('name', '%' . $name. '%');

        return $query;
    }
}