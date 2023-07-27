<?php

namespace GameBackend\Entity\SRO\Log\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class LogEventChar extends EntityRepository
{
    /**
     * @return QueryBuilder
     */
    public function getQueryBuilder(): QueryBuilder
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.eventTime', 'desc');

        return $queryBuilder;
    }
}