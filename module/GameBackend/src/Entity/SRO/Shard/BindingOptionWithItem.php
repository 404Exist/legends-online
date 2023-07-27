<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * BindingOptionWithItem
 *
 * @ORM\Table(name="_BindingOptionWithItem")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\BindingOptionWithItem")
 */
class BindingOptionWithItem
{
    /**
     * @var Item
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Item")
     * @ORM\JoinColumn(name="nItemDBID", referencedColumnName="ID64")
     */
    private $item;

    /**
     * @var integer
     *
     * @ORM\Column(name="bOptType", type="smallint", nullable=false)
     * @ORM\Id
     */
    private $optType;

    /**
     * @var integer
     *
     * @ORM\Column(name="nSlot", type="smallint", nullable=false)
     * @ORM\Id
     */
    private $slot;

    /**
     * @var integer
     *
     * @ORM\Column(name="nOptValue", type="integer", nullable=false)
     */
    private $optValue;

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     * @return $this
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return int
     */
    public function getOptType()
    {
        return $this->optType;
    }

    /**
     * @param int $optType
     * @return $this
     */
    public function setOptType($optType)
    {
        $this->optType = $optType;
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
     * @return $this
     */
    public function setSlot($slot)
    {
        $this->slot = $slot;
        return $this;
    }

    /**
     * @return int
     */
    public function getOptValue()
    {
        return $this->optValue;
    }

    /**
     * @param int $optValue
     * @return $this
     */
    public function setOptValue($optValue)
    {
        $this->optValue = $optValue;
        return $this;
    }


}