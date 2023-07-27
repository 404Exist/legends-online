<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\CharacterInterface;

/**
 * Character
 *
 * @ORM\Table(name="_Char")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\Character")
 */
class Character implements CharacterInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Deleted", type="smallint", nullable=false)
     */
    private $deleted = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="RefObjID", type="integer", nullable=false)
     */
    private $refObjId = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="CharName16", type="string", length=64, nullable=false)
     */
    private $charName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="NickName16", type="string", length=17, nullable=false)
     */
    private $nickName = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="CurLevel", type="smallint", nullable=false)
     */
    private $level = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="MaxLevel", type="smallint", nullable=false)
     */
    private $maxLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Strength", type="smallint", nullable=false)
     */
    private $strength = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Intellect", type="smallint", nullable=false)
     */
    private $intellect = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="HP", type="integer", nullable=false)
     */
    private $hp = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="MP", type="integer", nullable=false)
     */
    private $mp = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="LatestRegion", type="smallint", nullable=false)
     */
    private $latestRegion = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="PosX", type="float", nullable=false)
     */
    private $posX = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="PosY", type="float", nullable=false)
     */
    private $posY = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="PosZ", type="float", nullable=false)
     */
    private $posZ = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="LastLogout", type="datetime", nullable=false)
     */
    private $lastLogout = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="TelRegion", type="smallint", nullable=false)
     */
    private $telRegion = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="TelPosX", type="float", nullable=false)
     */
    private $telPosX = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="TelPosY", type="float", nullable=false)
     */
    private $telPosY = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="TelPosZ", type="float", nullable=false)
     */
    private $telPosZ = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="DiedRegion", type="smallint", nullable=false)
     */
    private $diedRegion = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="DiedPosX", type="float", nullable=false)
     */
    private $diedPosX = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="DiedPosY", type="float", nullable=false)
     */
    private $diedPosY = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="DiedPosZ", type="float", nullable=false)
     */
    private $diedPosZ = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="WorldID", type="smallint", nullable=false)
     */
    private $worldId = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="TelWorldID", type="smallint", nullable=false)
     */
    private $telWorldId = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="DiedWorldID", type="smallint", nullable=false)
     */
    private $diedWorldId = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="HwanLevel", type="smallint", nullable=false)
     */
    private $hwanLevel = 1;

    /**
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="GuildID", referencedColumnName="ID")
     **/
    private $guild;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $user;

    /**
     * @var CharTriJob
     *
     * @ORM\OneToOne(targetEntity="CharTriJob")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $job;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param int $deleted
     *
     * @return Character
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return int
     */
    public function getRefObjId()
    {
        return $this->refObjId;
    }

    /**
     * @param int $refObjId
     *
     * @return Character
     */
    public function setRefObjId($refObjId)
    {
        $this->refObjId = $refObjId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->charName;
    }

    /**
     * @param string $charName
     *
     * @return Character
     */
    public function setName($charName)
    {
        $this->charName = $charName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param string $nickName
     *
     * @return Character
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
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
     * @return Character
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLevel()
    {
        return $this->maxLevel;
    }

    /**
     * @param int $maxLevel
     *
     * @return Character
     */
    public function setMaxLevel($maxLevel)
    {
        $this->maxLevel = $maxLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param int $strength
     *
     * @return Character
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
        return $this;
    }

    /**
     * @return int
     */
    public function getIntellect()
    {
        return $this->intellect;
    }

    /**
     * @param int $intellect
     *
     * @return Character
     */
    public function setIntellect($intellect)
    {
        $this->intellect = $intellect;
        return $this;
    }

    /**
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     *
     * @return Character
     */
    public function setHp($hp)
    {
        $this->hp = $hp;
        return $this;
    }

    /**
     * @return int
     */
    public function getMp()
    {
        return $this->mp;
    }

    /**
     * @param int $mp
     *
     * @return Character
     */
    public function setMp($mp)
    {
        $this->mp = $mp;
        return $this;
    }

    /**
     * @return int
     */
    public function getLatestRegion()
    {
        return $this->latestRegion;
    }

    /**
     * @param int $latestRegion
     * @return $this
     */
    public function setLatestRegion($latestRegion)
    {
        $this->latestRegion = $latestRegion;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * @param float $posX
     * @return $this
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * @param float $posY
     * @return $this
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
        return $this;
    }

    /**
     * @return float
     */
    public function getPosZ()
    {
        return $this->posZ;
    }

    /**
     * @param float $posZ
     * @return $this
     */
    public function setPosZ($posZ)
    {
        $this->posZ = $posZ;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogout()
    {
        return $this->lastLogout;
    }

    /**
     * @param \DateTime $lastLogout
     * @return $this
     */
    public function setLastLogout($lastLogout)
    {
        $this->lastLogout = $lastLogout;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelRegion()
    {
        return $this->telRegion;
    }

    /**
     * @param int $telRegion
     * @return $this
     */
    public function setTelRegion($telRegion)
    {
        $this->telRegion = $telRegion;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosX()
    {
        return $this->telPosX;
    }

    /**
     * @param float $telPosX
     * @return $this
     */
    public function setTelPosX($telPosX)
    {
        $this->telPosX = $telPosX;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosY()
    {
        return $this->telPosY;
    }

    /**
     * @param float $telPosY
     * @return $this
     */
    public function setTelPosY($telPosY)
    {
        $this->telPosY = $telPosY;
        return $this;
    }

    /**
     * @return float
     */
    public function getTelPosZ()
    {
        return $this->telPosZ;
    }

    /**
     * @param float $telPosZ
     * @return $this
     */
    public function setTelPosZ($telPosZ)
    {
        $this->telPosZ = $telPosZ;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiedRegion()
    {
        return $this->diedRegion;
    }

    /**
     * @param int $diedRegion
     * @return $this
     */
    public function setDiedRegion($diedRegion)
    {
        $this->diedRegion = $diedRegion;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosX()
    {
        return $this->diedPosX;
    }

    /**
     * @param float $diedPosX
     * @return $this
     */
    public function setDiedPosX($diedPosX)
    {
        $this->diedPosX = $diedPosX;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosY()
    {
        return $this->diedPosY;
    }

    /**
     * @param float $diedPosY
     * @return $this
     */
    public function setDiedPosY($diedPosY)
    {
        $this->diedPosY = $diedPosY;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiedPosZ()
    {
        return $this->diedPosZ;
    }

    /**
     * @param float $diedPosZ
     * @return $this
     */
    public function setDiedPosZ($diedPosZ)
    {
        $this->diedPosZ = $diedPosZ;
        return $this;
    }

    /**
     * @return int
     */
    public function getWorldId()
    {
        return $this->worldId;
    }

    /**
     * @param int $worldId
     * @return $this
     */
    public function setWorldId($worldId)
    {
        $this->worldId = $worldId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelWorldId()
    {
        return $this->telWorldId;
    }

    /**
     * @param int $telWorldId
     * @return $this
     */
    public function setTelWorldId($telWorldId)
    {
        $this->telWorldId = $telWorldId;
        return $this;
    }

    /**
     * @return int
     */
    public function getDiedWorldId()
    {
        return $this->diedWorldId;
    }

    /**
     * @param int $diedWorldId
     * @return $this
     */
    public function setDiedWorldId($diedWorldId)
    {
        $this->diedWorldId = $diedWorldId;
        return $this;
    }

    /**
     * @return int
     */
    public function getHwanLevel()
    {
        return $this->hwanLevel;
    }

    /**
     * @param int $hwanLevel
     * @return $this
     */
    public function setHwanLevel($hwanLevel)
    {
        $this->hwanLevel = $hwanLevel;
        return $this;
    }

    /**
     * @return null|Guild
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param Guild $guild
     *
     * @return $this
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Character
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return CharTriJob
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param CharTriJob $job
     * @return Character
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * @return string
     */
    public function getRace(): string
    {
        $race = _('China');
        if ($this->refObjId > 2000) {
            $race = _('Europe');
        }

        return $race;
    }

}