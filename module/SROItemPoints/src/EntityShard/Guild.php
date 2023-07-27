<?php

namespace PServerCMS\SROItemPoints\EntityShard;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guild
 *
 * @ORM\Table(name="_Guild")
 * @ORM\Entity(repositoryClass="PServerCMS\SROItemPoints\EntityShard\Repository\Guild")
 */
class Guild extends \GameBackend\Entity\SRO\Shard\Guild
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