<?php

namespace GameBackend\Entity\SRO\Account\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\SRO\Account;

class SkSilk extends EntityRepository
{
    /**
     * @param $userId
     * @return Account\SkSilk|null
     */
    public function getSilk4UserId($userId): ?Account\SkSilk
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.jid = :jid')
            ->setParameter('jid', $userId)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param $userId
     * @param int $coins
     */
    public function updateSilkOwn($userId, int $coins): void
    {
        $query = $this->createQueryBuilder('p')
            ->update($this->getEntityName(), 'p')
            ->set('p.silkOwn', 'p.silkOwn + ' . $coins)
            ->where('p.jid = :jid')
            ->setParameter('jid', $userId)
            ->getQuery();

        $query->execute();
    }
}