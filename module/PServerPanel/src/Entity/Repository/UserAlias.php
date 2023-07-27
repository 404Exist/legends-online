<?php

namespace PServerPanel\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\Game\CharacterInterface;
use SmallUser\Entity\UserInterface;

class UserAlias extends EntityRepository
{
    /**
     * @param UserInterface $user
     * @return \PServerPanel\Entity\UserAlias
     */
    public function getUserAlias(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.user = :user')
            ->setMaxResults(1)
            ->setParameter('user', $user)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param UserInterface $user
     */
    public function deleteUserAlias4User(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->delete($this->getEntityName(), 'p')
            ->where('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery();

        $query->execute();
    }

    /**
     * @param UserInterface $user
     * @param CharacterInterface $character
     */
    public function setUserAlias(UserInterface $user, CharacterInterface $character)
    {
        $this->deleteUserAlias4User($user);

        $entity = $this->getEntityName();
        /** @var \PServerPanel\Entity\UserAlias $entity */
        $entity = new $entity;
        $entity->setUser($user)
            ->setCharName($character->getName())
            ->setCharId($character->getId());

        $entityManager = $this->getEntityManager();
        $entityManager->persist($entity);
        $entityManager->flush();
    }

}