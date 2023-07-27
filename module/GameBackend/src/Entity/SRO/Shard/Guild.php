<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\GuildInterface;

/**
 * Guild
 *
 * @ORM\Table(name="_Guild")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\Guild")
 */
class Guild implements GuildInterface
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
     * @ORM\Column(name="Name", type="string", length=64, nullable=false)
     */
    private $name = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Lvl", type="smallint", nullable=false)
     */
    private $level = 0;

    /**
     * @var Alliance|null
     *
     * @ORM\ManyToOne(targetEntity="Alliance")
     * @ORM\JoinColumn(name="Alliance", referencedColumnName="ID")
     **/
    private $alliance;

    /**
     * @var GuildMember[]
     *
     * @ORM\OneToMany(targetEntity="GuildMember", mappedBy="guild")
     * @ORM\JoinColumn(name="ID", referencedColumnName="GuildID")
     */
    private $memberList;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return Alliance|null
     */
    public function getAlliance(): ?Alliance
    {
        return $this->alliance;
    }

    /**
     * @param Alliance|null $alliance
     *
     * @return $this
     */
    public function setAlliance(?Alliance $alliance): self
    {
        $this->alliance = $alliance;
        return $this;
    }

    /**
     * @return GuildMember[]
     */
    public function getMemberList()
    {
        return $this->memberList;
    }

    /**
     * @param GuildMember[] $memberList
     * @return self
     */
    public function setMemberList($memberList)
    {
        $this->memberList = $memberList;
        return $this;
    }

}