<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use GameBackend\Entity\SRO\Shard;
use Doctrine\ORM\EntityRepository;

class Alliance extends EntityRepository
{
    /**
     * @param int $id
     * @return Shard\AllianceInterface|null
     */
    public function getAlliance4Id($id): ?Shard\AllianceInterface
    {
        $query = $this->createQueryBuilder('p')
            ->select()
            ->join('p.masterGuild', 'masterGuild')
            ->leftJoin('p.guild2', 'guild2', Join::WITH, 'guild2.id > 0')
            ->leftJoin('p.guild3', 'guild3', Join::WITH, 'guild3.id > 0')
            ->leftJoin('p.guild4', 'guild4', Join::WITH, 'guild4.id > 0')
            ->leftJoin('p.guild5', 'guild5', Join::WITH, 'guild5.id > 0')
            ->leftJoin('p.guild6', 'guild6', Join::WITH, 'guild6.id > 0')
            ->leftJoin('p.guild7', 'guild7', Join::WITH, 'guild7.id > 0')
            ->leftJoin('p.guild8', 'guild8', Join::WITH, 'guild8.id > 0')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->andWhere('p.id > 0')
            ->setMaxResults(1);

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @return QueryBuilder
     */
    public function getTopAlliance(): QueryBuilder
    {
        $query = $this->createQueryBuilder('p')
            ->select('
                p.id,
                (masterGuild.level + COALESCE(guild2.level, 0) + COALESCE(guild3.level, 0) + COALESCE(guild4.level, 0) + COALESCE(guild5.level, 0) + COALESCE(guild6.level, 0) + COALESCE(guild7.level, 0) + COALESCE(guild8.level, 0)) as points,
                masterGuild.name as name
                ')
            ->join('p.masterGuild', 'masterGuild')
            ->leftJoin('p.guild2', 'guild2', Join::WITH, 'guild2.id > 0')
            ->leftJoin('p.guild3', 'guild3', Join::WITH, 'guild3.id > 0')
            ->leftJoin('p.guild4', 'guild4', Join::WITH, 'guild4.id > 0')
            ->leftJoin('p.guild5', 'guild5', Join::WITH, 'guild5.id > 0')
            ->leftJoin('p.guild6', 'guild6', Join::WITH, 'guild6.id > 0')
            ->leftJoin('p.guild7', 'guild7', Join::WITH, 'guild7.id > 0')
            ->leftJoin('p.guild8', 'guild8', Join::WITH, 'guild8.id > 0')
            ->where('p.id > 0')
            ->orderBy('points', 'desc');

        return $query;
    }

    /**
     * @return array
     */
    public function getTopAllianceSitemap(): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('
                p.id,
                (masterGuild.level + COALESCE(guild2.level, 0) + COALESCE(guild3.level, 0) + COALESCE(guild4.level, 0) + COALESCE(guild5.level, 0) + COALESCE(guild6.level, 0) + COALESCE(guild7.level, 0) + COALESCE(guild8.level, 0)) as points,
                masterGuild.name as name
                ')
            ->join('p.masterGuild', 'masterGuild')
            ->leftJoin('p.guild2', 'guild2', Join::WITH, 'guild2.id > 0')
            ->leftJoin('p.guild3', 'guild3', Join::WITH, 'guild3.id > 0')
            ->leftJoin('p.guild4', 'guild4', Join::WITH, 'guild4.id > 0')
            ->leftJoin('p.guild5', 'guild5', Join::WITH, 'guild5.id > 0')
            ->leftJoin('p.guild6', 'guild6', Join::WITH, 'guild6.id > 0')
            ->leftJoin('p.guild7', 'guild7', Join::WITH, 'guild7.id > 0')
            ->leftJoin('p.guild8', 'guild8', Join::WITH, 'guild8.id > 0')
            ->where('p.id > 0')
            ->orderBy('points', 'desc')
            ->setMaxResults(200);

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_SCALAR);
    }

    /**
     * @return int
     */
    public function getCountAlliance(): int
    {
        $query = $this->createQueryBuilder('p')
            ->select('COUNT(DISTINCT p.masterGuild)')
            ->join('p.masterGuild', 'masterGuild')
            ->where('p.id > 0')
            ->getQuery();

        return $query->getResult(2)[0][1];
    }
}
