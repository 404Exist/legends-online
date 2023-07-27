<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;

class GuildMember extends EntityRepository
{
    /**
     * @param $guildId
     *
     * @return \GameBackend\Entity\SRO\Shard\GuildMember[]|null
     */
    public function getGuildMember4GuildId($guildId)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'character')
            ->join('p.character', 'character')
            ->where('p.guild = :guild')
            ->setParameter('guild', $guildId)
            ->orderBy('p.memberClass', 'asc')
            ->addOrderBy('p.level', 'desc');

        return $query->getQuery()->getResult();
    }
}