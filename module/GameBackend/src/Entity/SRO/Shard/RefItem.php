<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\RefItemInterface;

/**
 * RefObjItem
 *
 * @ORM\Table(name="_RefObjCommon")
 * @ORM\Entity()
 */
class RefItem implements RefItemInterface
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
     * @var string
     *
     * @ORM\Column(name="CodeName128", type="string", nullable=false)
     */
    private $codeName;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeID1", type="smallint", nullable=false)
     */
    private $typeIdOne;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeID2", type="smallint", nullable=false)
     */
    private $typeIdSecond;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeID3", type="smallint", nullable=false)
     */
    private $typeIdThird;

    /**
     * @var integer
     *
     * @ORM\Column(name="TypeID4", type="smallint", nullable=false)
     */
    private $typeIdFourth;

    /**
     * @var integer
     *
     * @ORM\Column(name="Country", type="smallint", nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="Rarity", type="smallint", nullable=false)
     */
    private $rarity;

    /**
     * @var string
     *
     * @ORM\Column(name="AssocFileIcon128", type="string", nullable=false)
     */
    private $iconPath;

    /**
     * @var integer
     *
     * @ORM\Column(name="ReqLevel1", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var RefObjItem
     *
     * @ORM\OneToOne(targetEntity="RefObjItem", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="Link", referencedColumnName="ID")
     */
    private $itemDetail;

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
     * @return RefItem
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodeName()
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     * @return $this
     */
    public function setCodeName($codeName)
    {
        $this->codeName = $codeName;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeIdOne()
    {
        return $this->typeIdOne;
    }

    /**
     * @param int $typeIdOne
     * @return $this
     */
    public function setTypeIdOne($typeIdOne)
    {
        $this->typeIdOne = $typeIdOne;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeIdSecond()
    {
        return $this->typeIdSecond;
    }

    /**
     * @param int $typeIdSecond
     * @return $this
     */
    public function setTypeIdSecond($typeIdSecond)
    {
        $this->typeIdSecond = $typeIdSecond;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeIdThird()
    {
        return $this->typeIdThird;
    }

    /**
     * @param int $typeIdThird
     * @return $this
     */
    public function setTypeIdThird($typeIdThird)
    {
        $this->typeIdThird = $typeIdThird;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeIdFourth()
    {
        return $this->typeIdFourth;
    }

    /**
     * @param int $typeIdFourth
     * @return $this
     */
    public function setTypeIdFourth($typeIdFourth)
    {
        $this->typeIdFourth = $typeIdFourth;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param int $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return int
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param int $rarity
     * @return $this
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
        return $this;
    }

    /**
     * @return string
     */
    public function getIconPath()
    {
        $iconPath = $this->iconPath;
        $iconPath = str_replace('\\', '/', $iconPath);

        if (substr($iconPath, -4) == '.ddj') {
            $iconPath = sprintf('%s.jpg', substr($iconPath, 0, strlen($iconPath) - 4));
        }

        return sprintf('/sro/%s', $iconPath);
    }

    /**
     * @param string $iconPath
     *
     * @return RefItem
     */
    public function setIconPath($iconPath)
    {
        $this->iconPath = $iconPath;
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
     *
     * @return RefItem
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return RefObjItem
     */
    public function getItemDetail()
    {
        return $this->itemDetail;
    }

    /**
     * @param RefObjItem $itemDetail
     * @return $this
     */
    public function setItemDetail($itemDetail)
    {
        $this->itemDetail = $itemDetail;
        return $this;
    }


}