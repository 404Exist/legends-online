<?php


namespace GameBackend\Entity\SRO\Shard;


use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\GuildMemberInterface;

/**
 * Guild
 *
 * @ORM\Table(name="_GuildMember")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\GuildMember")
 */
class GuildMember implements GuildMemberInterface
{
    /**
     * @var Guild
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Guild", inversedBy="member")
     * @ORM\JoinColumn(name="GuildID", referencedColumnName="ID")
     */
    private $guild;

    /**
     * @var Character
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Character", mappedBy="CharID")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     */
    private $character;

    /**
     * @var integer
     *
     * @ORM\Column(name="CharLevel", type="smallint", nullable=false)
     */
    private $level = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="MemberClass", type="smallint", nullable=false)
     */
    private $memberClass = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="JoinDate", type="datetime", nullable=false)
     */
    private $joinDate;

    public function __construct()
    {
        $this->joinDate = new \DateTime();
    }

    /**
     * @return Guild
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param Guild $guild
     *
     * @return GuildMember
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;
        return $this;
    }

    /**
     * @return Character
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param Character $character
     *
     * @return GuildMember
     */
    public function setCharacter($character)
    {
        $this->character = $character;
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
     * @return GuildMember
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getMemberClass()
    {
        return $this->memberClass;
    }

    /**
     * @param int $memberClass
     *
     * @return GuildMember
     */
    public function setMemberClass($memberClass)
    {
        $this->memberClass = $memberClass;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getJoinDate()
    {
        return $this->joinDate;
    }

    /**
     * @param \DateTime $joinDate
     *
     * @return GuildMember
     */
    public function setJoinDate($joinDate)
    {
        $this->joinDate = $joinDate;
        return $this;
    }


}