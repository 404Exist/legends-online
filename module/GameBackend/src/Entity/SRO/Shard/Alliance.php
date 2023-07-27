<?php

namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\GuildInterface;

/**
 * Alliance
 *
 * @ORM\Table(name="_AlliedClans")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\Alliance")
 */
class Alliance implements AllianceInterface
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
     * @var GuildInterface
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally1", referencedColumnName="ID")
     **/
    private $masterGuild;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally2", referencedColumnName="ID")
     **/
    private $guild2;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally3", referencedColumnName="ID")
     **/
    private $guild3;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally4", referencedColumnName="ID")
     **/
    private $guild4;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally5", referencedColumnName="ID")
     **/
    private $guild5;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally6", referencedColumnName="ID")
     **/
    private $guild6;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally7", referencedColumnName="ID")
     **/
    private $guild7;

    /**
     * @var GuildInterface|null
     *
     * @ORM\ManyToOne(targetEntity="Guild")
     * @ORM\JoinColumn(name="Ally8", referencedColumnName="ID")
     **/
    private $guild8;

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
     * @return $this
     */
    public function setId($id): AllianceInterface
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return GuildInterfaceInterface
     */
    public function getMasterGuild(): GuildInterface
    {
        return $this->masterGuild;
    }

    /**
     * @param GuildInterface $masterGuild
     *
     * @return $this
     */
    public function setMasterGuild(?GuildInterface $masterGuild): AllianceInterface
    {
        $this->masterGuild = $masterGuild;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild2(): ?GuildInterface
    {
        return $this->guild2;
    }

    /**
     * @param GuildInterface|null $guild2
     *
     * @return $this
     */
    public function setGuild2(?GuildInterface $guild2): AllianceInterface
    {
        $this->guild2 = $guild2;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild3(): ?GuildInterface
    {
        return $this->guild3;
    }

    /**
     * @param GuildInterface|null $guild3
     *
     * @return $this
     */
    public function setGuild3(?GuildInterface $guild3): AllianceInterface
    {
        $this->guild3 = $guild3;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild4(): ?GuildInterface
    {
        return $this->guild4;
    }

    /**
     * @param GuildInterface|null $guild4
     *
     * @return $this
     */
    public function setGuild4(?GuildInterface $guild4): AllianceInterface
    {
        $this->guild4 = $guild4;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild5(): ?GuildInterface
    {
        return $this->guild5;
    }

    /**
     * @param GuildInterface|null $guild5
     *
     * @return $this
     */
    public function setGuild5(?GuildInterface $guild5): AllianceInterface
    {
        $this->guild5 = $guild5;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild6(): ?GuildInterface
    {
        return $this->guild6;
    }

    /**
     * @param GuildInterface|null $guild6
     *
     * @return $this
     */
    public function setGuild6(?GuildInterface $guild6): AllianceInterface
    {
        $this->guild6 = $guild6;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild7(): ?GuildInterface
    {
        return $this->guild7;
    }

    /**
     * @param GuildInterface|null $guild7
     *
     * @return $this
     */
    public function setGuild7(?GuildInterface $guild7): AllianceInterface
    {
        $this->guild7 = $guild7;
        return $this;
    }

    /**
     * @return GuildInterface|null
     */
    public function getGuild8(): ?GuildInterface
    {
        return $this->guild8;
    }

    /**
     * @param GuildInterface|null $guild8
     *
     * @return $this
     */
    public function setGuild8(?GuildInterface $guild8): AllianceInterface
    {
        $this->guild8 = $guild8;
        return $this;
    }

}
