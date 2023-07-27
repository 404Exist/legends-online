<?php

namespace PServerPanel\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use PServerPanel\Entity\VoteSites as VoteSite;
use PServerCore\Entity\UserInterface;

class VoteHistory extends EntityRepository
{
    /**
     * @param UserInterface $user
     * @param VoteSite $voteSites
     * @param string $ip
     * @return bool
     */
    public function isVoteAllowed(UserInterface $user, VoteSite $voteSites, string $ip)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->join('p.user', 'user')
            ->where('(p.user = :user or (p.ip = :ip AND p.ip != \'127.0.0.1\') or user.email = :email)')
            ->andWhere('p.voteSite = :voteSite')
            ->andWhere('p.expire >= :expire')
            ->setMaxResults(1)
            ->setParameter('email', $user->getEmail())
            ->setParameter('user', $user)
            ->setParameter('ip', $ip)
            ->setParameter('voteSite', $voteSites)
            ->setParameter('expire', new \DateTime())
            ->getQuery();

        return !(bool)$query->getOneOrNullResult($query::HYDRATE_SIMPLEOBJECT);
    }

    /**
     * @param UserInterface $user
     * @param string $ip
     * @return \PServerPanel\Entity\VoteHistory[]
     */
    public function getVoteHistory(UserInterface $user, string $ip)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'vote')
            ->join('p.user', 'user')
            ->join('p.voteSite', 'vote')
            ->where('(p.user = :user or (p.ip = :ip AND p.ip != \'127.0.0.1\') or user.email = :email)')
            ->andWhere('p.expire >= :expire')
            ->setParameter('email', $user->getEmail())
            ->setParameter('user', $user)
            ->setParameter('ip', $ip)
            ->setParameter('expire', new \DateTime())
            ->getQuery();

        return $query->getResult();
    }

}