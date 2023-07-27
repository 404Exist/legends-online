<?php

namespace GameBackend\Entity\SRO\Log\Repository;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\Game\CharacterInterface;
use GameBackend\Entity\SRO\Log\OnlineOffline as Entity;

/**
 * Class OnlineOffline
 * @package GameBackend\Entity\SRO\Log\Repository
 */
class OnlineOffline extends EntityRepository
{
    /**
     * @return int
     */
    public function getOnlinePlayer()
    {
        $query = $this->createQueryBuilder('p')
            ->select('COUNT(p.charId)')
            ->where('p.status = :status')
            ->setParameter('status', Entity::TYPE_ONLINE)
            ->getQuery();

        return $query->getSingleScalarResult();
    }

    /**
     * @param CharacterInterface $character
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function isCharacterOnline(CharacterInterface $character)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p.charId')
            ->where('p.status = :status')
            ->andWhere('p.charId = :charId')
            ->setParameter('status', Entity::TYPE_ONLINE)
            ->setParameter('charId', $character->getId())
            ->getQuery();

        return (bool)$query->getOneOrNullResult(AbstractQuery::HYDRATE_SCALAR);
    }

}