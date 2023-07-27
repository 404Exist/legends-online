<?php

namespace PServerCore\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use PServerCore\Entity\UserInterface;

class LoginHistory extends EntityRepository
{

    /**
     * @param UserInterface $user
     * @param int $days
     * @return \PServerCore\Entity\LoginHistory[]
     */
    public function getLastLoginList4User(UserInterface $user, $days = 10)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.user = :user')
            ->setParameter('user', $user)
            ->orderBy('p.created', 'desc')
            ->setMaxResults($days)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @return QueryBuilder
     */
    public function getLoginHistoryQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->select('p', 'user')
            ->leftJoin('p.user', 'user')
            ->orderBy('p.created', 'desc');
    }

    /**
     * @param UserInterface $user
     */
    public function deleteHistory(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->delete()
            ->where('p.user = :user')
            ->setParameter('user', $user);

        $query->getQuery()
            ->execute();
    }
}