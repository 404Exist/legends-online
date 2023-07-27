<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\ItemInterface;

/**
 * Items
 *
 * @ORM\Table(name="_Items")
 * @ORM\Entity()
 */
class Item implements ItemInterface
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="ID64", type="bigint", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var RefItem
     *
     * @ORM\ManyToOne(targetEntity="RefItem", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="RefItemID", referencedColumnName="ID")
     */
    private $refItem;

    /**
     * @var integer
     *
     * @ORM\Column(name="OptLevel", type="smallint", nullable=false)
     */
    private $optLevel;

    /**
     * @var integer
     *
     * @ORM\Column(name="Variance", type="bigint", nullable=false)
     */
    private $variance;

    /**
     * @var integer
     *
     * @ORM\Column(name="Data", type="integer", nullable=false)
     */
    private $data;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParamNum", type="smallint", nullable=false)
     */
    private $magParamNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam1", type="bigint", nullable=false)
     */
    private $magParam1;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam2", type="bigint", nullable=false)
     */
    private $magParam2;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam3", type="bigint", nullable=false)
     */
    private $magParam3;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam4", type="bigint", nullable=false)
     */
    private $magParam4;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam5", type="bigint", nullable=false)
     */
    private $magParam5;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam6", type="bigint", nullable=false)
     */
    private $magParam6;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam7", type="bigint", nullable=false)
     */
    private $magParam7;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam8", type="bigint", nullable=false)
     */
    private $magParam8;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam9", type="bigint", nullable=false)
     */
    private $magParam9;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam10", type="bigint", nullable=false)
     */
    private $magParam10;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam11", type="bigint", nullable=false)
     */
    private $magParam11;

    /**
     * @var integer
     *
     * @ORM\Column(name="MagParam12", type="bigint", nullable=false)
     */
    private $magParam12;

    /**
     * @var BindingOptionWithItem
     *
     * @ORM\OneToOne(targetEntity="BindingOptionWithItem", inversedBy="item")
     * @ORM\JoinColumn(name="ID64", referencedColumnName="nItemDBID")
     **/
    private $bindOptionWhiteItem;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Item
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return RefItem
     */
    public function getRefItem()
    {
        return $this->refItem;
    }

    /**
     * @param RefItem $refItem
     *
     * @return Item
     */
    public function setRefItem($refItem)
    {
        $this->refItem = $refItem;
        return $this;
    }

    /**
     * @return int
     */
    public function getOptLevel()
    {
        return $this->optLevel;
    }

    /**
     * @param int $optLevel
     * @return $this
     */
    public function setOptLevel($optLevel)
    {
        $this->optLevel = $optLevel;
        return $this;
    }

    public function getAllOptLevel()
    {
        $bindingLevel = 0;
        if ($this->getBindOptionWhiteItem()) {
            $bindingLevel = $this->getBindOptionWhiteItem()->getOptValue();
        }

        return $this->getOptLevel() + $bindingLevel;
    }

    /**
     * @return int
     */
    public function getVariance()
    {
        return $this->variance;
    }

    /**
     * @return int
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param int $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param int $variance
     * @return $this
     */
    public function setVariance($variance)
    {
        $this->variance = $variance;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParamNum()
    {
        return $this->magParamNum;
    }

    /**
     * @param int $magParamNum
     * @return $this
     */
    public function setMagParamNum($magParamNum)
    {
        $this->magParamNum = $magParamNum;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam1()
    {
        return $this->magParam1;
    }

    /**
     * @param int $magParam1
     * @return $this
     */
    public function setMagParam1($magParam1)
    {
        $this->magParam1 = $magParam1;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam2()
    {
        return $this->magParam2;
    }

    /**
     * @param int $magParam2
     * @return $this
     */
    public function setMagParam2($magParam2)
    {
        $this->magParam2 = $magParam2;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam3()
    {
        return $this->magParam3;
    }

    /**
     * @param int $magParam3
     * @return $this
     */
    public function setMagParam3($magParam3)
    {
        $this->magParam3 = $magParam3;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam4()
    {
        return $this->magParam4;
    }

    /**
     * @param int $magParam4
     * @return $this
     */
    public function setMagParam4($magParam4)
    {
        $this->magParam4 = $magParam4;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam5()
    {
        return $this->magParam5;
    }

    /**
     * @param int $magParam5
     * @return $this
     */
    public function setMagParam5($magParam5)
    {
        $this->magParam5 = $magParam5;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam6()
    {
        return $this->magParam6;
    }

    /**
     * @param int $magParam6
     * @return $this
     */
    public function setMagParam6($magParam6)
    {
        $this->magParam6 = $magParam6;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam7()
    {
        return $this->magParam7;
    }

    /**
     * @param int $magParam7
     * @return $this
     */
    public function setMagParam7($magParam7)
    {
        $this->magParam7 = $magParam7;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam8()
    {
        return $this->magParam8;
    }

    /**
     * @param int $magParam8
     * @return $this
     */
    public function setMagParam8($magParam8)
    {
        $this->magParam8 = $magParam8;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam9()
    {
        return $this->magParam9;
    }

    /**
     * @param int $magParam9
     * @return $this
     */
    public function setMagParam9($magParam9)
    {
        $this->magParam9 = $magParam9;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam10()
    {
        return $this->magParam10;
    }

    /**
     * @param int $magParam10
     * @return $this
     */
    public function setMagParam10($magParam10)
    {
        $this->magParam10 = $magParam10;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam11()
    {
        return $this->magParam11;
    }

    /**
     * @param int $magParam11
     * @return $this
     */
    public function setMagParam11($magParam11)
    {
        $this->magParam11 = $magParam11;
        return $this;
    }

    /**
     * @return int
     */
    public function getMagParam12()
    {
        return $this->magParam12;
    }

    /**
     * @param int $magParam12
     * @return $this
     */
    public function setMagParam12($magParam12)
    {
        $this->magParam12 = $magParam12;
        return $this;
    }

    /**
     * @return BindingOptionWithItem
     */
    public function getBindOptionWhiteItem()
    {
        return $this->bindOptionWhiteItem;
    }

    /**
     * @param BindingOptionWithItem $bindOptionWhiteItem
     * @return $this
     */
    public function setBindOptionWhiteItem($bindOptionWhiteItem)
    {
        $this->bindOptionWhiteItem = $bindOptionWhiteItem;
        return $this;
    }


}