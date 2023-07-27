<?php


namespace GameBackend\Entity\CrossFire;


use GameBackend\Entity\Game\CharacterInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * CF_USER
 *
 * @ORM\Table(name="CF_USER")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\CrossFire\Repository\Character")
 */
class Character implements CharacterInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="USN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usn;

    /**
     * @var string
     *
     * @ORM\Column(name="NICK", type="string", length=30, nullable=false)
     */
    private $nickName = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="LEV", type="integer", nullable=false)
     */
    private $level = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="EXP", type="bigint", nullable=false)
     */
    private $exp = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="ENEMY_KILL_CNT", type="integer", nullable=false)
     */
    private $enemyKillCount = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="DEATH_CNT", type="integer", nullable=false)
     */
    private $deathCount = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LAST_PLAY_DATE", type="datetime", nullable=false)
     */
    private $lastPlayDate = 'CURRENT_TIMESTAMP';

    /**
     * @return int
     */
    public function getId()
    {
        return $this->usn;
    }

    /**
     * @param int $usn
     * @return self
     */
    public function setId($usn)
    {
        $this->usn = $usn;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     * @return self
     */
    public function setName($nickName)
    {
        $this->nickName = $nickName;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return float
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param float $exp
     * @return self
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
        return $this;
    }

    /**
     * @return int
     */
    public function getEnemyKillCount()
    {
        return $this->enemyKillCount;
    }

    /**
     * @param int $enemyKillCount
     * @return self
     */
    public function setEnemyKillCount($enemyKillCount)
    {
        $this->enemyKillCount = $enemyKillCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeathCount()
    {
        return $this->deathCount;
    }

    /**
     * @param int $deathCount
     * @return self
     */
    public function setDeathCount($deathCount)
    {
        $this->deathCount = $deathCount;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogout()
    {
        return $this->lastPlayDate;
    }

    /**
     * @param \DateTime $lastPlayDate
     * @return self
     */
    public function setLastLogout($lastPlayDate)
    {
        $this->lastPlayDate = $lastPlayDate;
        return $this;
    }

    /**
     * @return null
     */
    public function getGuild()
    {
        return null;
    }


}