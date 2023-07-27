<?php

namespace PServerCMS\SROUnique\Shard\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unique
 *
 * @ORM\Table(name="_UniqueKillList")
 * @ORM\Entity(repositoryClass="PServerCMS\SROUnique\Shard\Entity\Repository\UniqueKillList")
 */
class UniqueKillList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var UniqueInfo
     *
     * @ORM\ManyToOne(targetEntity="UniqueInfo")
     * @ORM\JoinColumn(name="CodeName128", referencedColumnName="CodeName128")
     **/
    private $uniqueInfo;

    /**
     * @var \GameBackend\Entity\SRO\Shard\Character
     *
     * @ORM\ManyToOne(targetEntity="GameBackend\Entity\SRO\Shard\Character")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $character;

    /**
     * Unique constructor.
     */
    public function __construct()
    {
        $this->time = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return self
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return UniqueInfo
     */
    public function getUniqueInfo(): UniqueInfo
    {
        return $this->uniqueInfo;
    }

    /**
     * @param UniqueInfo $uniqueInfo
     * @return self
     */
    public function setUniqueInfo($uniqueInfo)
    {
        $this->uniqueInfo = $uniqueInfo;
        return $this;
    }

    /**
     * @return \GameBackend\Entity\SRO\Shard\Character
     */
    public function getCharacter(): \GameBackend\Entity\SRO\Shard\Character
    {
        return $this->character;
    }

    /**
     * @param \GameBackend\Entity\SRO\Shard\Character $character
     * @return self
     */
    public function setCharacter($character)
    {
        $this->character = $character;
        return $this;
    }

}