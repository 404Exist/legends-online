<?php

namespace GameBackend\Entity\SRO\Log\Repository;

use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\EntityRepository;

class KillDeathCounter extends EntityRepository
{
    /**
     * @param int $charId
     * @return array
     */
    public function getEntries4CharId(int $charId): array
    {
        $sql = '
SELECT [death], [kill], [code] FROM _KillDeathCounter kh
WHERE kh.CharId = ?';

        $values = [
            $charId,
        ];
        $types = [
            ParameterType::INTEGER,
        ];

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($sql, $values, $types);

        return $stmt->fetchAllAssociative();
    }

    /**
     * @param string $type
     * @param string $shardDBName
     * @return int
     */
    public function getCount(string $type, string $shardDBName): int
    {
        $sql = '
SELECT COUNT(DISTINCT _Char.CharID) as number FROM _KillDeathCounter kh
JOIN ' . $shardDBName . '.dbo._Char as _Char on _Char.CharID = kh.CharID AND _Char.Deleted = 0
WHERE kh.[code] = ?';

        $values = [
            $type,
        ];
        $types = [
            ParameterType::STRING,
        ];

        $conn = $this->getEntityManager()->getConnection();
        $stmt = $conn->executeQuery($sql, $values, $types);

        $data = $stmt->fetchAllAssociative();

        return $data[0]['number'] ?? 0;
    }

    /**
     * @param string $code
     * @param string $shardDB
     * @return string
     */
    public function getTopCharacter(string $code, string $shardDB): string
    {
        $sql = '
SELECT _Char.CharID as charId, _Char.GuildID as guildId, _Guild.Name as guildName, _Char.CharName16 as charName, kh.[death], kh.[kill] FROM _KillDeathCounter kh
JOIN ' . $shardDB . '.dbo._Char as _Char on _Char.CharID = kh.CharID AND _Char.Deleted = 0
LEFT JOIN ' . $shardDB . '.dbo._Guild as _Guild on _Guild.ID = _Char.GuildID
WHERE kh.[code] = \'' . $code . '\' and [death] > 0 ORDER BY [kill]/[death] OFFSET :offset: ROWS 
FETCH NEXT :limit: ROWS ONLY;';

        return $sql;
    }

}