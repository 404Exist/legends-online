<?php

namespace PServerCMS\SROUnique\Shard\Entity;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\SRO\Shard\Character;

/**
 * Unique
 *
 * @ORM\Table(name="_UniqueRanking")
 * @ORM\Entity(repositoryClass="PServerCMS\SROUnique\Shard\Entity\Repository\UniqueRanking")
 */
class UniqueRanking
{

    /**
     * @var Character
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="GameBackend\Entity\SRO\Shard\Character")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $character;

    /**
     * @var UniqueInfo
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="UniqueInfo")
     * @ORM\JoinColumn(name="CodeName128", referencedColumnName="CodeName128")
     **/
    private $uniqueInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=false)
     */
    private $points;

    /**
     * @return Character
     */
    public function getCharacter(): Character
    {
        return $this->character;
    }

    /**
     * @param Character $character
     * @return self
     */
    public function setCharacter(Character $character)
    {
        $this->character = $character;
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
     * @return int
     */
    public function getPoints(): int
    {
        return $this->points;
    }

    /**
     * @param int $points
     * @return self
     */
    public function setPoints(int $points)
    {
        $this->points = $points;
        return $this;
    }

}