<?php

namespace PServerCMS\SROItemPoints\EntityShard;

use Doctrine\ORM\Mapping as ORM;

/**
 * Character
 *
 * @ORM\Table(name="_Char")
 * @ORM\Entity(repositoryClass="PServerCMS\SROItemPoints\EntityShard\Repository\Character")
 */
class Character extends \GameBackend\Entity\SRO\Shard\Character
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ItemPoints", type="integer", nullable=false)
     */
    private $itemPoints = 0;

    /**
     * @return int
     */
    public function getItemPoints()
    {
        return $this->itemPoints;
    }

    /**
     * @param int $itemPoints
     * @return $this
     */
    public function setItemPoints($itemPoints)
    {
        $this->itemPoints = $itemPoints;
        return $this;
    }

}