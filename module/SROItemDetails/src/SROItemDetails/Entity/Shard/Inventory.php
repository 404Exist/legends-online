<?php

namespace SROItemDetails\Entity\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\SRO\Shard\Character;
use GameBackend\Entity\Game\InventoryInterface;

/**
 * Inventory
 *
 * @ORM\Table(name="_Inventory")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\Inventory")
 */
class Inventory implements InventoryInterface
{
    /**
     * @var Character
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="GameBackend\Entity\SRO\Shard\Character", inversedBy="inventory")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $char;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="Slot", type="integer", nullable=false)
     */
    private $slot;

    /**
     * @var Item
     *
     * @ORM\OneToOne(targetEntity="Item", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="ItemID", referencedColumnName="ID64")
     */
    private $item;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->char->getId();
    }

    /**
     * @return Character
     */
    public function getCharacter()
    {
        return $this->char;
    }

    /**
     * @param Character $char
     *
     * @return Inventory
     */
    public function setCharacter($char)
    {
        $this->char = $char;
        return $this;
    }

    /**
     * @return int
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * @param int $slot
     *
     * @return Inventory
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;
        return $this;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     *
     * @return Inventory
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }


}