<?php

namespace GameBackend\Entity\SRO\Log;

use Doctrine\ORM\Mapping as ORM;

/**
 * KillHistory
 *
 * @ORM\Table(name="_KillDeathCounter")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Log\Repository\KillDeathCounter")
 */
class KillDeathCounter
{
    public const CODE_PVP = 'pvp';
    public const CODE_JOB = 'job';

    /**
     * @var integer
     *
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charId = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", nullable=false)
     */
    private $code = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="death", type="integer", nullable=false)
     */
    private $death = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="`kill`", type="integer", nullable=false)
     */
    private $kill = 0;

    /**
     * @return int
     */
    public function getCharId(): int
    {
        return $this->charId;
    }

    /**
     * @param int $charId
     * @return $this
     */
    public function setCharId(int $charId): KillDeathCounter
    {
        $this->charId = $charId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): KillDeathCounter
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int
     */
    public function getDeath(): int
    {
        return $this->death;
    }

    /**
     * @param int $death
     * @return $this
     */
    public function setDeath(int $death): KillDeathCounter
    {
        $this->death = $death;
        return $this;
    }

    /**
     * @return int
     */
    public function getKill(): int
    {
        return $this->kill;
    }

    /**
     * @param int $kill
     * @return $this
     */
    public function setKill(int $kill): KillDeathCounter
    {
        $this->kill = $kill;
        return $this;
    }

}