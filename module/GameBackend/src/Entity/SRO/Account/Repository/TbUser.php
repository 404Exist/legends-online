<?php


namespace GameBackend\Entity\SRO\Account\Repository;


use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\User\UserInterface;

class TbUser extends EntityRepository
{
    /**
     * @return array
     */
    public function getSpecialUserIdList()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p.jid')
            ->where('p.secPrimary != :secPrimary')
            ->setParameter('secPrimary', 3)
            ->groupBy('p.jid')
            ->getQuery();

        return $query->getResult($query::HYDRATE_ARRAY);
    }

    /**
     * @param UserInterface $user
     * @return null|\GameBackend\Entity\SRO\Account\TbUser
     */
    public function getUser4Login(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.struserid = :username')
            ->setParameter('username', $user->getUsername())
            ->andWhere('p.password = :password')
            ->setParameter('password', $user->getPassword())
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function isUserNameExists(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.struserid = :username')
            ->setParameter('username', $user->getUsername())
            ->setMaxResults(1)
            ->getQuery();

        return (bool)$query->getOneOrNullResult();
    }

}