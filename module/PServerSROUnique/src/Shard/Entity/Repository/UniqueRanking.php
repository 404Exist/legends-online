<?php

namespace PServerCMS\SROUnique\Shard\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class UniqueRanking extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\Query
     */
    public function getTopUniqueCharacter()
    {
        return $this->createQueryBuilder('p')
            ->select('SUM(p.points) as points, IDENTITY(p.character) as charId, character.charName, guild.name as guildName, guild.id as guildId')
            ->join('p.character', 'character', Join::WITH, 'character.deleted = 0')
            ->leftJoin('character.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->groupBy('p.character, character.charName, guild.name, guild.id')
            ->orderBy('points', 'desc')
            ->getQuery();
    }

    /**
     * @return int
     */
    public function getTopUniqueCharacterCount()
    {
        $query = $this->createQueryBuilder('p')
            ->select('COUNT(DISTINCT p.character)')
            ->join('p.character', 'character', Join::WITH, 'character.deleted = 0')
            ->getQuery();

        return $query->getResult(2)[0][1];
    }

    /**
     * @param int $limit
     * @return \PServerCMS\SROUnique\Shard\Entity\UniqueKillList[]
     */
    public function getPointsPerUnique($charId, $limit = 5)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'uniqueInfo', 'character')
            ->join('p.uniqueInfo', 'uniqueInfo')
            ->join('p.character', 'character')
            ->where('p.character = :charId')
            ->setParameter('charId', $charId)
            ->orderBy('p.points', 'desc')
            ->setMaxResults($limit)
            ->getQuery();

        return $query->getResult();
    }
}