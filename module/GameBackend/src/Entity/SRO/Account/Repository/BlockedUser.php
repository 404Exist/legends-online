<?php


namespace GameBackend\Entity\SRO\Account\Repository;


use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\SRO\Account\BlockedUser as Entity;
use GameBackend\Entity\SRO\Account\Punishment;
use GameBackend\Entity\User\UserInterface;

class BlockedUser extends EntityRepository
{
    /**
     * @return array
     */
    public function getBlockedUserIdList()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p.userjid as jid')
            ->andWhere('p.timeend >= :timeend')
            ->setParameter('timeend', new \DateTime())
            ->groupBy('p.userjid')
            ->getQuery();

        return $query->getResult($query::HYDRATE_ARRAY);
    }

    /**
     * @param UserInterface $user
     * @return bool
     */
    public function removeBlock(UserInterface $user)
    {
        $this->createQueryBuilder('p')
            ->delete('GameBackend\Entity\SRO\Account\BlockedUser', 'p')
            ->where('p.userjid = :userjid')
            ->setParameter('userjid', $user->getBackendId())
            ->andWhere('p.type = :type')
            ->setParameter('type', 1)
            ->getQuery()
            ->execute();

        return true;
    }

    /**
     * @param UserInterface $user
     * @param Punishment $punishment
     * @return Entity
     */
    public function addBlock(UserInterface $user, Punishment $punishment)
    {
        $entityManager = $this->createQueryBuilder('p')->getEntityManager();
        $blockedUser = new Entity();
        $blockedUser->setUserJid($user->getBackendId())
            ->setUserId($user->getUsername())
            ->setType(1)
            ->setSerialNo($punishment->getSerialNo())
            ->setTimeBegin($punishment->getBlockStartTime())
            ->setTimeEnd($punishment->getBlockEndTime());

        $entityManager->persist($blockedUser);
        $entityManager->flush();

        return $blockedUser;
    }
}