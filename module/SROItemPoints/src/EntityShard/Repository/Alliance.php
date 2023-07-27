<?php

namespace PServerCMS\SROItemPoints\EntityShard\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;

class Alliance extends \GameBackend\Entity\SRO\Shard\Repository\Alliance
{
    /**
     * @return QueryBuilder
     */
    public function getTopAlliance(): QueryBuilder
    {
        $query = $this->createQueryBuilder('p')
            ->select('
                p.id,
                (masterGuild.itemPoints + COALESCE(guild2.itemPoints, 0) + COALESCE(guild3.itemPoints, 0) + COALESCE(guild4.itemPoints, 0) + COALESCE(guild5.itemPoints, 0) + COALESCE(guild6.itemPoints, 0) + COALESCE(guild7.itemPoints, 0) + COALESCE(guild8.itemPoints, 0)) as points,
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
}