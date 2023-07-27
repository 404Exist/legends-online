<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;

class SiegeFortress extends EntityRepository
{
    /**
     * @return \GameBackend\Entity\SRO\Shard\SiegeFortress[]|null
     */
    public function getFortressGuildList()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild')
            ->leftJoin('p.guild', 'guild')
            ->orderBy('p.id', 'asc')
            ->getQuery();

        return $query->getResult();
    }
}