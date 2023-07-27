<?php


namespace GameBackend\Entity\SRO\Account\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\SRO\Account\Punishment as Entity;
use GameBackend\Entity\User\UserInterface;

class Punishment extends EntityRepository
{
    /**
     * @param UserInterface $user
     * @param \DateTime $datetime
     * @param               $reason
     * @return Entity
     */
    public function addPunishment(UserInterface $user, \DateTime $datetime, $reason)
    {
        $entityManager = $this->createQueryBuilder('p')->getEntityManager();

        $punishment = new Entity();
        $punishment->setUserJid($user->getBackendId())
            ->setGuide($reason)
            ->setDescription($reason)
            ->setBlockEndTime($datetime);

        $entityManager->persist($punishment);
        $entityManager->flush();

        return $punishment;
    }
}