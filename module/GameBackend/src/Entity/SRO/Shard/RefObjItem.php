<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefObjItem
 *
 * @ORM\Table(name="_RefObjItem")
 * @ORM\Entity()
 */
class RefObjItem
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
     * @var integer
     *
     * @ORM\Column(name="MaxStack", type="integer", nullable=false)
     */
    private $maxStack;

    /**
     * @var integer
     *
     * @ORM\Column(name="ReqGender", type="integer", nullable=false)
     */
    private $reqGender;

    /**
     * @var integer
     *
     * @ORM\Column(name="ReqStr", type="integer", nullable=false)
     */
    private $reqStr;

    /**
     * @var integer
     *
     * @ORM\Column(name="ReqInt", type="integer", nullable=false)
     */
    private $reqInt;

    /**
     * @var integer
     *
     * @ORM\Column(name="ItemClass", type="integer", nullable=false)
     */
    private $itemClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="SetID", type="integer", nullable=false)
     */
    private $setId;

    /**
     * @var float
     *
     * @ORM\Column(name="Dur_L", type="float", nullable=false)
     */
    private $durL;

    /**
     * @var float
     *
     * @ORM\Column(name="Dur_U", type="float", nullable=false)
     */
    private $durU;

    /**
     * @var float
     *
     * @ORM\Column(name="PD_L", type="float", nullable=false)
     */
    private $pdL;

    /**
     * @var float
     *
     * @ORM\Column(name="PD_U", type="float", nullable=false)
     */
    private $pdU;

    /**
     * @var float
     *
     * @ORM\Column(name="PDInc", type="float", nullable=false)
     */
    private $pdInc;

    /**
     * @var float
     *
     * @ORM\Column(name="ER_L", type="float", nullable=false)
     */
    private $erL;

    /**
     * @var float
     *
     * @ORM\Column(name="ER_U", type="float", nullable=false)
     */
    private $erU;

    /**
     * @var float
     *
     * @ORM\Column(name="ERInc", type="float", nullable=false)
     */
    private $erInc;

    /**
     * @var float
     *
     * @ORM\Column(name="PAR_L", type="float", nullable=false)
     */
    private $parL;

    /**
     * @var float
     *
     * @ORM\Column(name="PAR_U", type="float", nullable=false)
     */
    private $parU;

    /**
     * @var float
     *
     * @ORM\Column(name="PARInc", type="float", nullable=false)
     */
    private $parInc;

    /**
     * @var float
     *
     * @ORM\Column(name="BR_L", type="float", nullable=false)
     */
    private $brL;

    /**
     * @var float
     *
     * @ORM\Column(name="BR_U", type="float", nullable=false)
     */
    private $brU;

    /**
     * @var float
     *
     * @ORM\Column(name="MD_L", type="float", nullable=false)
     */
    private $mdL;

    /**
     * @var float
     *
     * @ORM\Column(name="MD_U", type="float", nullable=false)
     */
    private $mdU;

    /**
     * @var float
     *
     * @ORM\Column(name="MDInc", type="float", nullable=false)
     */
    private $mdInc;

    /**
     * @var float
     *
     * @ORM\Column(name="MAR_L", type="float", nullable=false)
     */
    private $marL;

    /**
     * @var float
     *
     * @ORM\Column(name="MAR_U", type="float", nullable=false)
     */
    private $marU;

    /**
     * @var float
     *
     * @ORM\Column(name="MARInc", type="float", nullable=false)
     */
    private $marInc;

    /**
     * @var float
     *
     * @ORM\Column(name="PDStr_L", type="float", nullable=false)
     */
    private $pdStrL;

    /**
     * @var float
     *
     * @ORM\Column(name="PDStr_U", type="float", nullable=false)
     */
    private $pdStrU;

    /**
     * @var float
     *
     * @ORM\Column(name="MDInt_L", type="float", nullable=false)
     */
    private $mdIntL;

    /**
     * @var float
     *
     * @ORM\Column(name="MDInt_U", type="float", nullable=false)
     */
    private $mdIntU;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quivered", type="smallint", nullable=false)
     */
    private $quivered;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ammo1_TID4", type="smallint", nullable=false)
     */
    private $ammo1TId4;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ammo2_TID4", type="smallint", nullable=false)
     */
    private $ammo2TId4;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ammo3_TID4", type="smallint", nullable=false)
     */
    private $ammo3TId4;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ammo4_TID4", type="smallint", nullable=false)
     */
    private $ammo4TId4;

    /**
     * @var integer
     *
     * @ORM\Column(name="Ammo5_TID4", type="smallint", nullable=false)
     */
    private $ammo5TId4;

    /**
     * @var integer
     *
     * @ORM\Column(name="SpeedClass", type="smallint", nullable=false)
     */
    private $speedClass;

    /**
     * @var integer
     *
     * @ORM\Column(name="TwoHanded", type="smallint", nullable=false)
     */
    private $twoHanded;

    /**
     * @var integer
     *
     * @ORM\Column(name="Range", type="smallint", nullable=false)
     */
    private $range;

    /**
     * @var float
     *
     * @ORM\Column(name="PAttackMin_L", type="float", nullable=false)
     */
    private $pAttackMinL;

    /**
     * @var float
     *
     * @ORM\Column(name="PAttackMin_U", type="float", nullable=false)
     */
    private $pAttackMinU;

    /**
     * @var float
     *
     * @ORM\Column(name="PAttackMax_L", type="float", nullable=false)
     */
    private $pAttackMaxL;

    /**
     * @var float
     *
     * @ORM\Column(name="PAttackMax_U", type="float", nullable=false)
     */
    private $pAttackMaxU;

    /**
     * @var float
     *
     * @ORM\Column(name="PAttackInc", type="float", nullable=false)
     */
    private $pAttackInc;

    /**
     * @var float
     *
     * @ORM\Column(name="MAttackMin_L", type="float", nullable=false)
     */
    private $mAttackMinL;

    /**
     * @var float
     *
     * @ORM\Column(name="MAttackMin_U", type="float", nullable=false)
     */
    private $mAttackMinU;

    /**
     * @var float
     *
     * @ORM\Column(name="MAttackMax_L", type="float", nullable=false)
     */
    private $mAttackMaxL;

    /**
     * @var float
     *
     * @ORM\Column(name="MAttackMax_U", type="float", nullable=false)
     */
    private $mAttackMaxU;

    /**
     * @var float
     *
     * @ORM\Column(name="MAttackInc", type="float", nullable=false)
     */
    private $mAttackInc;

    /**
     * @var float
     *
     * @ORM\Column(name="PAStrMin_L", type="float", nullable=false)
     */
    private $paStrMinL;

    /**
     * @var float
     *
     * @ORM\Column(name="PAStrMin_U", type="float", nullable=false)
     */
    private $paStrMinU;

    /**
     * @var float
     *
     * @ORM\Column(name="PAStrMax_L", type="float", nullable=false)
     */
    private $paStrMaxL;

    /**
     * @var float
     *
     * @ORM\Column(name="PAStrMax_U", type="float", nullable=false)
     */
    private $paStrMaxU;

    /**
     * @var float
     *
     * @ORM\Column(name="MAInt_Min_L", type="float", nullable=false)
     */
    private $maIntMinL;

    /**
     * @var float
     *
     * @ORM\Column(name="MAInt_Min_U", type="float", nullable=false)
     */
    private $maIntMinU;

    /**
     * @var float
     *
     * @ORM\Column(name="MAInt_Max_L", type="float", nullable=false)
     */
    private $maIntMaxL;

    /**
     * @var float
     *
     * @ORM\Column(name="MAInt_Max_U", type="float", nullable=false)
     */
    private $maIntMaxU;

    /**
     * @var float
     *
     * @ORM\Column(name="HR_L", type="float", nullable=false)
     */
    private $hrL;

    /**
     * @var float
     *
     * @ORM\Column(name="HR_U", type="float", nullable=false)
     */
    private $hrU;

    /**
     * @var float
     *
     * @ORM\Column(name="HRInc", type="float", nullable=false)
     */
    private $hrInc;

    /**
     * @var float
     *
     * @ORM\Column(name="CHR_L", type="float", nullable=false)
     */
    private $chrL;

    /**
     * @var float
     *
     * @ORM\Column(name="CHR_U", type="float", nullable=false)
     */
    private $chrU;

    /**
     * @var integer
     *
     * @ORM\Column(name="MaxMagicOptCount", type="smallint", nullable=false)
     */
    private $maxMagicOptCount;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxStack()
    {
        return $this->maxStack;
    }

    /**
     * @param int $maxStack
     * @return $this
     */
    public function setMaxStack($maxStack)
    {
        $this->maxStack = $maxStack;
        return $this;
    }

    /**
     * @return int
     */
    public function getReqGender()
    {
        return $this->reqGender;
    }

    /**
     * @param int $reqGender
     * @return $this
     */
    public function setReqGender($reqGender)
    {
        $this->reqGender = $reqGender;
        return $this;
    }

    /**
     * @return int
     */
    public function getReqStr()
    {
        return $this->reqStr;
    }

    /**
     * @param int $reqStr
     * @return $this
     */
    public function setReqStr($reqStr)
    {
        $this->reqStr = $reqStr;
        return $this;
    }

    /**
     * @return int
     */
    public function getReqInt()
    {
        return $this->reqInt;
    }

    /**
     * @param int $reqInt
     * @return $this
     */
    public function setReqInt($reqInt)
    {
        $this->reqInt = $reqInt;
        return $this;
    }

    /**
     * @return int
     */
    public function getItemClass()
    {
        return $this->itemClass;
    }

    /**
     * @param int $itemClass
     * @return $this
     */
    public function setItemClass($itemClass)
    {
        $this->itemClass = $itemClass;
        return $this;
    }

    /**
     * @return int
     */
    public function getSetId()
    {
        return $this->setId;
    }

    /**
     * @param int $setId
     * @return $this
     */
    public function setSetId($setId)
    {
        $this->setId = $setId;
        return $this;
    }

    /**
     * @return float
     */
    public function getDurL()
    {
        return $this->durL;
    }

    /**
     * @param float $durL
     * @return $this
     */
    public function setDurL($durL)
    {
        $this->durL = $durL;
        return $this;
    }

    /**
     * @return float
     */
    public function getDurU()
    {
        return $this->durU;
    }

    /**
     * @param float $durU
     * @return $this
     */
    public function setDurU($durU)
    {
        $this->durU = $durU;
        return $this;
    }

    /**
     * @return float
     */
    public function getPdL()
    {
        return $this->pdL;
    }

    /**
     * @param float $pdL
     * @return $this
     */
    public function setPdL($pdL)
    {
        $this->pdL = $pdL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPdU()
    {
        return $this->pdU;
    }

    /**
     * @param float $pdU
     * @return $this
     */
    public function setPdU($pdU)
    {
        $this->pdU = $pdU;
        return $this;
    }

    /**
     * @return float
     */
    public function getPdInc()
    {
        return $this->pdInc;
    }

    /**
     * @param float $pdInc
     * @return $this
     */
    public function setPdInc($pdInc)
    {
        $this->pdInc = $pdInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getErL()
    {
        return $this->erL;
    }

    /**
     * @param float $erL
     * @return $this
     */
    public function setErL($erL)
    {
        $this->erL = $erL;
        return $this;
    }

    /**
     * @return float
     */
    public function getErU()
    {
        return $this->erU;
    }

    /**
     * @param float $erU
     * @return $this
     */
    public function setErU($erU)
    {
        $this->erU = $erU;
        return $this;
    }

    /**
     * @return float
     */
    public function getErInc()
    {
        return $this->erInc;
    }

    /**
     * @param float $erInc
     * @return $this
     */
    public function setErInc($erInc)
    {
        $this->erInc = $erInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getParL()
    {
        return $this->parL;
    }

    /**
     * @param float $parL
     * @return $this
     */
    public function setParL($parL)
    {
        $this->parL = $parL;
        return $this;
    }

    /**
     * @return float
     */
    public function getParU()
    {
        return $this->parU;
    }

    /**
     * @param float $parU
     * @return $this
     */
    public function setParU($parU)
    {
        $this->parU = $parU;
        return $this;
    }

    /**
     * @return float
     */
    public function getParInc()
    {
        return $this->parInc;
    }

    /**
     * @param float $parInc
     * @return $this
     */
    public function setParInc($parInc)
    {
        $this->parInc = $parInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getBrL()
    {
        return $this->brL;
    }

    /**
     * @param float $brL
     * @return $this
     */
    public function setBrL($brL)
    {
        $this->brL = $brL;
        return $this;
    }

    /**
     * @return float
     */
    public function getBrU()
    {
        return $this->brU;
    }

    /**
     * @param float $brU
     * @return $this
     */
    public function setBrU($brU)
    {
        $this->brU = $brU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMdL()
    {
        return $this->mdL;
    }

    /**
     * @param float $mdL
     * @return $this
     */
    public function setMdL($mdL)
    {
        $this->mdL = $mdL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMdU()
    {
        return $this->mdU;
    }

    /**
     * @param float $mdU
     * @return $this
     */
    public function setMdU($mdU)
    {
        $this->mdU = $mdU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMdInc()
    {
        return $this->mdInc;
    }

    /**
     * @param float $mdInc
     * @return $this
     */
    public function setMdInc($mdInc)
    {
        $this->mdInc = $mdInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarL()
    {
        return $this->marL;
    }

    /**
     * @param float $marL
     * @return $this
     */
    public function setMarL($marL)
    {
        $this->marL = $marL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarU()
    {
        return $this->marU;
    }

    /**
     * @param float $marU
     * @return $this
     */
    public function setMarU($marU)
    {
        $this->marU = $marU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarInc()
    {
        return $this->marInc;
    }

    /**
     * @param float $marInc
     * @return $this
     */
    public function setMarInc($marInc)
    {
        $this->marInc = $marInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getPdStrL()
    {
        return $this->pdStrL;
    }

    /**
     * @param float $pdStrL
     * @return $this
     */
    public function setPdStrL($pdStrL)
    {
        $this->pdStrL = $pdStrL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPdStrU()
    {
        return $this->pdStrU;
    }

    /**
     * @param float $pdStrU
     * @return $this
     */
    public function setPdStrU($pdStrU)
    {
        $this->pdStrU = $pdStrU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMdIntL()
    {
        return $this->mdIntL;
    }

    /**
     * @param float $mdIntL
     * @return $this
     */
    public function setMdIntL($mdIntL)
    {
        $this->mdIntL = $mdIntL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMdIntU()
    {
        return $this->mdIntU;
    }

    /**
     * @param float $mdIntU
     * @return $this
     */
    public function setMdIntU($mdIntU)
    {
        $this->mdIntU = $mdIntU;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuivered()
    {
        return $this->quivered;
    }

    /**
     * @param int $quivered
     * @return $this
     */
    public function setQuivered($quivered)
    {
        $this->quivered = $quivered;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmmo1TId4()
    {
        return $this->ammo1TId4;
    }

    /**
     * @param int $ammo1TId4
     * @return $this
     */
    public function setAmmo1TId4($ammo1TId4)
    {
        $this->ammo1TId4 = $ammo1TId4;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmmo2TId4()
    {
        return $this->ammo2TId4;
    }

    /**
     * @param int $ammo2TId4
     * @return $this
     */
    public function setAmmo2TId4($ammo2TId4)
    {
        $this->ammo2TId4 = $ammo2TId4;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmmo3TId4()
    {
        return $this->ammo3TId4;
    }

    /**
     * @param int $ammo3TId4
     * @return $this
     */
    public function setAmmo3TId4($ammo3TId4)
    {
        $this->ammo3TId4 = $ammo3TId4;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmmo4TId4()
    {
        return $this->ammo4TId4;
    }

    /**
     * @param int $ammo4TId4
     * @return $this
     */
    public function setAmmo4TId4($ammo4TId4)
    {
        $this->ammo4TId4 = $ammo4TId4;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmmo5TId4()
    {
        return $this->ammo5TId4;
    }

    /**
     * @param int $ammo5TId4
     * @return $this
     */
    public function setAmmo5TId4($ammo5TId4)
    {
        $this->ammo5TId4 = $ammo5TId4;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeedClass()
    {
        return $this->speedClass;
    }

    /**
     * @param int $speedClass
     * @return $this
     */
    public function setSpeedClass($speedClass)
    {
        $this->speedClass = $speedClass;
        return $this;
    }

    /**
     * @return int
     */
    public function getTwoHanded()
    {
        return $this->twoHanded;
    }

    /**
     * @param int $twoHanded
     * @return $this
     */
    public function setTwoHanded($twoHanded)
    {
        $this->twoHanded = $twoHanded;
        return $this;
    }

    /**
     * @return int
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * @param int $range
     * @return $this
     */
    public function setRange($range)
    {
        $this->range = $range;
        return $this;
    }

    /**
     * @return float
     */
    public function getPAttackMinL()
    {
        return $this->pAttackMinL;
    }

    /**
     * @param float $pAttackMinL
     * @return $this
     */
    public function setPAttackMinL($pAttackMinL)
    {
        $this->pAttackMinL = $pAttackMinL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPAttackMinU()
    {
        return $this->pAttackMinU;
    }

    /**
     * @param float $pAttackMinU
     * @return $this
     */
    public function setPAttackMinU($pAttackMinU)
    {
        $this->pAttackMinU = $pAttackMinU;
        return $this;
    }

    /**
     * @return float
     */
    public function getPAttackMaxL()
    {
        return $this->pAttackMaxL;
    }

    /**
     * @param float $pAttackMaxL
     * @return $this
     */
    public function setPAttackMaxL($pAttackMaxL)
    {
        $this->pAttackMaxL = $pAttackMaxL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPAttackMaxU()
    {
        return $this->pAttackMaxU;
    }

    /**
     * @param float $pAttackMaxU
     * @return $this
     */
    public function setPAttackMaxU($pAttackMaxU)
    {
        $this->pAttackMaxU = $pAttackMaxU;
        return $this;
    }

    /**
     * @return float
     */
    public function getPAttackInc()
    {
        return $this->pAttackInc;
    }

    /**
     * @param float $pAttackInc
     * @return $this
     */
    public function setPAttackInc($pAttackInc)
    {
        $this->pAttackInc = $pAttackInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getMAttackMinL()
    {
        return $this->mAttackMinL;
    }

    /**
     * @param float $mAttackMinL
     * @return $this
     */
    public function setMAttackMinL($mAttackMinL)
    {
        $this->mAttackMinL = $mAttackMinL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMAttackMinU()
    {
        return $this->mAttackMinU;
    }

    /**
     * @param float $mAttackMinU
     * @return $this
     */
    public function setMAttackMinU($mAttackMinU)
    {
        $this->mAttackMinU = $mAttackMinU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMAttackMaxL()
    {
        return $this->mAttackMaxL;
    }

    /**
     * @param float $mAttackMaxL
     * @return $this
     */
    public function setMAttackMaxL($mAttackMaxL)
    {
        $this->mAttackMaxL = $mAttackMaxL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMAttackMaxU()
    {
        return $this->mAttackMaxU;
    }

    /**
     * @param float $mAttackMaxU
     * @return $this
     */
    public function setMAttackMaxU($mAttackMaxU)
    {
        $this->mAttackMaxU = $mAttackMaxU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMAttackInc()
    {
        return $this->mAttackInc;
    }

    /**
     * @param float $mAttackInc
     * @return $this
     */
    public function setMAttackInc($mAttackInc)
    {
        $this->mAttackInc = $mAttackInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaStrMinL()
    {
        return $this->paStrMinL;
    }

    /**
     * @param float $paStrMinL
     * @return $this
     */
    public function setPaStrMinL($paStrMinL)
    {
        $this->paStrMinL = $paStrMinL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaStrMinU()
    {
        return $this->paStrMinU;
    }

    /**
     * @param float $paStrMinU
     * @return $this
     */
    public function setPaStrMinU($paStrMinU)
    {
        $this->paStrMinU = $paStrMinU;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaStrMaxL()
    {
        return $this->paStrMaxL;
    }

    /**
     * @param float $paStrMaxL
     * @return $this
     */
    public function setPaStrMaxL($paStrMaxL)
    {
        $this->paStrMaxL = $paStrMaxL;
        return $this;
    }

    /**
     * @return float
     */
    public function getPaStrMaxU()
    {
        return $this->paStrMaxU;
    }

    /**
     * @param float $paStrMaxU
     * @return $this
     */
    public function setPaStrMaxU($paStrMaxU)
    {
        $this->paStrMaxU = $paStrMaxU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaIntMinL()
    {
        return $this->maIntMinL;
    }

    /**
     * @param float $maIntMinL
     * @return $this
     */
    public function setMaIntMinL($maIntMinL)
    {
        $this->maIntMinL = $maIntMinL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaIntMinU()
    {
        return $this->maIntMinU;
    }

    /**
     * @param float $maIntMinU
     * @return $this
     */
    public function setMaIntMinU($maIntMinU)
    {
        $this->maIntMinU = $maIntMinU;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaIntMaxL()
    {
        return $this->maIntMaxL;
    }

    /**
     * @param float $maIntMaxL
     * @return $this
     */
    public function setMaIntMaxL($maIntMaxL)
    {
        $this->maIntMaxL = $maIntMaxL;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaIntMaxU()
    {
        return $this->maIntMaxU;
    }

    /**
     * @param float $maIntMaxU
     * @return $this
     */
    public function setMaIntMaxU($maIntMaxU)
    {
        $this->maIntMaxU = $maIntMaxU;
        return $this;
    }

    /**
     * @return float
     */
    public function getHrL()
    {
        return $this->hrL;
    }

    /**
     * @param float $hrL
     * @return $this
     */
    public function setHrL($hrL)
    {
        $this->hrL = $hrL;
        return $this;
    }

    /**
     * @return float
     */
    public function getHrU()
    {
        return $this->hrU;
    }

    /**
     * @param float $hrU
     * @return $this
     */
    public function setHrU($hrU)
    {
        $this->hrU = $hrU;
        return $this;
    }

    /**
     * @return float
     */
    public function getHrInc()
    {
        return $this->hrInc;
    }

    /**
     * @param float $hrInc
     * @return $this
     */
    public function setHrInc($hrInc)
    {
        $this->hrInc = $hrInc;
        return $this;
    }

    /**
     * @return float
     */
    public function getChrL()
    {
        return $this->chrL;
    }

    /**
     * @param float $chrL
     * @return $this
     */
    public function setChrL($chrL)
    {
        $this->chrL = $chrL;
        return $this;
    }

    /**
     * @return float
     */
    public function getChrU()
    {
        return $this->chrU;
    }

    /**
     * @param float $chrU
     * @return $this
     */
    public function setChrU($chrU)
    {
        $this->chrU = $chrU;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxMagicOptCount()
    {
        return $this->maxMagicOptCount;
    }

    /**
     * @param int $maxMagicOptCount
     * @return $this
     */
    public function setMaxMagicOptCount($maxMagicOptCount)
    {
        $this->maxMagicOptCount = $maxMagicOptCount;
        return $this;
    }


}