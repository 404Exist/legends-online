<?php

namespace GameBackend\Entity\SRO\Log\Repository;

use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\EntityRepository;

class KillHistory extends EntityRepository
{
    /**
     * @param int $charId
     * @param bool $isJob
     * @param int $limit
     * @param string $shardDBName
     * @return array
     */
    public function getKillingHistory(int $charId, bool $isJob, int $limit, string $shardDBName): array
    {
        $sql = '
SELECT TOP ' . $limit . '  _Char.CharID, _Char.CharName16, _DeathChar.CharID as DeathCharID, _DeathChar.CharName16 as DeathCharName16, kh.CharLevel, kh.DeathCharLevel, kh.created FROM _KillHistory kh
JOIN ' . $shardDBName . '.dbo._Char as _Char on kh.CharID = _Char.CharID
JOIN ' . $shardDBName . '.dbo._Char as _DeathChar on kh.DeathCharID = _DeathChar.CharID
WHERE (kh.CharID = ? OR kh.DeathCharId = ?) AND kh.isJob = ? ORDER BY kh.created DESC ';

        $values = [
            $charId,
            $charId,
            (int)$isJob,
        ];
        $types = [
            ParameterType::INTEGER,
            ParameterType::INTEGER,
            ParameterType::INTEGER,
        ];

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($sql, $values, $types);

        return $stmt->fetchAllAssociative();
    }

    /**
     * @param bool $isJob
     * @param int $limit
     * @param string $shardDBName
     * @return array
     */
    public function getKillingHistoryPool(bool $isJob, int $limit, string $shardDBName): array
    {
        $sql = '
SELECT TOP ' . $limit . '  _Char.CharID, _Char.CharName16, _DeathChar.CharID as DeathCharID, _DeathChar.CharName16 as DeathCharName16, kh.CharLevel, kh.DeathCharLevel, kh.created FROM _KillHistory kh
JOIN ' . $shardDBName . '.dbo._Char as _Char on kh.CharID = _Char.CharID
JOIN ' . $shardDBName . '.dbo._Char as _DeathChar on kh.DeathCharID = _DeathChar.CharID
WHERE kh.isJob = ? ORDER BY kh.created DESC ';

        $values = [
            (int)$isJob,
        ];
        $types = [
            ParameterType::INTEGER,
        ];

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($sql, $values, $types);

        return $stmt->fetchAllAssociative();
    }
}