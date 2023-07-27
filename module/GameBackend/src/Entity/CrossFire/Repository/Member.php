<?php

namespace GameBackend\Entity\CrossFire\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\User\UserInterface;

class Member extends EntityRepository
{

    /**
     * @param $userId
     * @param $password
     *
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function setPassword($userId, $password)
    {
        $sql = "UPDATE CF_MEMBER SET USER_PASS = hashbytes('sha1', ?) WHERE USN = ?";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        return $stmt->executeQuery([$password, $userId])->fetchAssociative();
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function isUserNameExists(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.userId = :username')
            ->setParameter('username', $user->getUsername())
            ->setMaxResults(1)
            ->getQuery();

        return (bool)$query->getOneOrNullResult();
    }

    /**
     * @param UserInterface $user
     * @return string[]
     */
    public function getUser4Login(UserInterface $user)
    {
        $sql = "SELECT USN, EMAIL FROM CF_MEMBER WHERE USER_ID = ? and USER_PASS = hashbytes('sha1', ?)";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);

        return $stmt->executeQuery([$user->getUsername(), $user->getPassword()])->fetchAssociative();
    }

} 