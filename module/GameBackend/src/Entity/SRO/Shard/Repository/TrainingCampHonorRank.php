<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class TrainingCampHonorRank extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getRankingQuery()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'master', 'camp', 'char', 'guild')
            ->join('p.master', 'master', Join::WITH, 'master.memberClass = 0')
            ->join('p.camp', 'camp', Join::WITH)
            ->join('master.char', 'char')
            ->leftJoin('char.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->orderBy('p.ranking', 'asc');

        return $query;
    }
}