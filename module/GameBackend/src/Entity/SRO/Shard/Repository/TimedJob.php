<?php
declare(strict_types=1);

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\EntityRepository;

class TimedJob extends EntityRepository
{
    /**
     * @param int $charId
     * @return array
     */
    public function getCurrentBuffs4CharId(int $charId): array
    {
        $sql = '
SELECT tj.CharID, rs.UI_IconFile as [file]
  FROM [_TimedJob] tj
  JOIN [_RefSkill] rs on rs.ID = tj.JobID
  WHERE tj.CharID = ? and tj.category = 0 and rs.Service = 1';

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
}