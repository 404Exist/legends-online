<?php

namespace SROItemDetails\Entity\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\InventoryInterface;
use GameBackend\Entity\SRO\Shard\Character;

/**
 * Inventory
 *
 * @ORM\Table(name="_InventoryForAvatar")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\InventoryForAvatar")
 */
class InventoryForAvatar implements InventoryInterface
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
     * @return Character
     */
    public function getCharacter()
    {
        return $this->char;
    }

    /**
     * @param Character $char
     *
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }
    
}
