<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use GameBackend\Entity\User\UserInterface;

class Character extends EntityRepository
{
    /**
     * @param int[] $jidList
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopCharacter(array $jidList = [])
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild')
            ->join('p.user', 'user')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->where('p.deleted = 0')
            ->andWhere('p.id > 0')
            ->orderBy('p.level', 'desc');

        if ($jidList) {
            $query->andWhere('user.jid NOT IN (:jidList)')
                ->setParameter('jidList', $jidList);
        }

        return $query;
    }

    /**
     * @param int[] $jidList
     *
     * @return array
     */
    public function getTopCharacterSitemap(array $jidList = []): array
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->select('p.id as id')
            ->where('p.deleted = 0')
            ->andWhere('p.id > 0')
            ->orderBy('p.level', 'desc')
            ->setMaxResults(10000);

        if ($jidList) {
            $queryBuilder->join('p.user', 'user')
                ->andWhere('user.jid NOT IN (:jidList)')
                ->setParameter('jidList', $jidList);
        }

        $query = $queryBuilder->getQuery();

        return $query->getResult($query::HYDRATE_SCALAR);
    }

    /**
     * @param int   $id
     * @param int[] $jidList
     *
     * @return \GameBackend\Entity\SRO\Shard\Character|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCharacter4Id($id, array $jidList = [])
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild', 'job')
            ->join('p.user', 'user')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->leftJoin('p.job', 'job', Join::WITH, 'job.jobType > 0')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->andWhere('p.id > 0')
            ->andWhere('p.deleted = 0');

        if ($jidList) {
            $query->andWhere('user.jid NOT IN (:jidList)')
                ->setParameter('jidList', $jidList);
        }

        $query = $query->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param UserInterface $user
     * @return \GameBackend\Entity\SRO\Shard\Character[]
     */
    public function getCharacterList4User(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild', 'job')
            ->join('p.user', 'user')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->leftJoin('p.job', 'job', Join::WITH, 'job.jobType > 0')
            ->where('user.jid = :id')
            ->setParameter('id', $user->getBackendId())
            ->andWhere('p.id > 0')
            ->andWhere('p.deleted = 0')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param UserInterface $user
     * @param int           $characterId
     * @return null|\GameBackend\Entity\SRO\Shard\Character
     */
    public function getCharacter4UserCharacterId(UserInterface $user, $characterId)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild', 'job')
            ->join('p.user', 'user')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->leftJoin('p.job', 'job', Join::WITH, 'job.jobType > 0')
            ->where('user.jid = :id')
            ->setParameter('id', $user->getBackendId())
            ->andWhere('p.id = :characterId')
            ->setParameter('characterId', $characterId)
            ->andWhere('p.deleted = 0')
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param $jobType
     * @param int[] $jidList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getTopJobCharacter($jobType, array $jidList = [])
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'guild', 'job')
            ->join('p.user', 'user')
            ->leftJoin('p.guild', 'guild', Join::WITH, 'guild.id > 0')
            ->leftJoin('p.job', 'job', Join::WITH, 'job.jobType > 0')
            ->where('p.deleted = 0')
            ->andWhere('p.id > 0')
            ->andWhere('job.jobType = :jobType')
            ->setParameter('jobType', $jobType)
            ->orderBy('job.level', 'desc')
            ->addOrderBy('job.exp', 'desc')
            ->addOrderBy('job.contribution', 'desc');

        if ($jidList) {
            $query->andWhere('user.jid NOT IN (:jidList)')
                ->setParameter('jidList', $jidList);
        }

        return $query;
    }

    /**
     * @param string $charName
     * @param int[]  $jidList
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getCharacterList($charName, array $jidList = [])
    {
        $query = $this->getTopCharacter($jidList);
        $query->andWhere('p.charName LIKE :charName')
            ->setParameter('charName', '%' . $charName. '%');

        return $query;
    }

    /**
     * @param string $logDBName
     * @param array $jidList
     * @return array
     */
    public function getCharacter4PlayerMap(string $logDBName, array $jidList = []): array
    {
        $sql = '
SELECT _Char.CharID, _Char.CharName16, _Char.LatestRegion, _Char.PosX, _Char.PosY, _Char.PosZ FROM _Char
JOIN ' . $logDBName . '.dbo._OnlineOffline as oo on oo.CharID = _Char.CharID AND oo.Status = \'Online\'
LEFT JOIN _Inventory ON _Char.CharID = _Inventory.CharID AND _inventory.Slot = 8
JOIN _User on _User.CharID = _Char.CharID
WHERE _Inventory.ItemID IS NULL OR _Inventory.ItemID = 0';

        $values = [];
        $types = [];

        if ($jidList) {
            $sql .= ' AND _User.UserJID NOT IN (?)';
            $values[] = $jidList;
            $types[] = Connection::PARAM_INT_ARRAY;
        }

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($sql, $values, $types);

        return $stmt->fetchAllAssociative();
    }
}