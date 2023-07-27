<?php


namespace GameBackend\Entity\CrossFire\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\Game\CharacterInterface;

class Character extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopCharacter()
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->orderBy('p.exp', 'desc');

        return $query;
    }

    /**
     * @return array
     */
    public function getTopCharacterSitemap(): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p.usn as id')
            ->orderBy('p.exp', 'desc')
            ->setMaxResults(10000);

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_ARRAY);
    }

    /**
     * @param int   $id
     *
     * @return CharacterInterface|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCharacter4Id($id)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.usn = :id')
            ->setParameter('id', $id)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param int $userId
     * @return CharacterInterface[]
     */
    public function getCharacterList4User($userId)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.usn = :id')
            ->setParameter('id', $userId)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param string $charName
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCharacterList($charName)
    {
        $query = $this->getTopCharacter();
        $query->andWhere('p.nickName LIKE :nickName')
            ->setParameter('nickName', '%' . $charName. '%');

        return $query;
    }
}