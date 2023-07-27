<?php

namespace PServerCMS\SROItemPoints\EntityShard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\SRO\Shard\AllianceInterface;
use GameBackend\Entity\Game\GuildInterface as GeneralGuild;

/**
 * Alliance
 *
 * @ORM\Table(name="_AlliedClans")
 * @ORM\Entity(repositoryClass="PServerCMS\SROItemPoints\EntityShard\Repository\Alliance")
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
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally1", referencedColumnName="ID")
     **/
    private $masterGuild;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally2", referencedColumnName="ID")
     **/
    private $guild2;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally3", referencedColumnName="ID")
     **/
    private $guild3;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally4", referencedColumnName="ID")
     **/
    private $guild4;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally5", referencedColumnName="ID")
     **/
    private $guild5;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally6", referencedColumnName="ID")
     **/
    private $guild6;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
     * @ORM\JoinColumn(name="Ally7", referencedColumnName="ID")
     **/
    private $guild7;

    /**
     * @var GeneralGuild|null
     *
     * @ORM\ManyToOne(targetEntity="PServerCMS\SROItemPoints\EntityShard\Guild", fetch="EAGER")
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
     * @return GeneralGuild
     */
    public function getMasterGuild(): GeneralGuild
    {
        return $this->masterGuild;
    }

    /**
     * @param GeneralGuild $masterGuild
     *
     * @return $this
     */
    public function setMasterGuild(?GeneralGuild $masterGuild): AllianceInterface
    {
        $this->masterGuild = $masterGuild;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild2(): ?GeneralGuild
    {
        return $this->guild2;
    }

    /**
     * @param GeneralGuild|null $guild2
     *
     * @return $this
     */
    public function setGuild2(?GeneralGuild $guild2): AllianceInterface
    {
        $this->guild2 = $guild2;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild3(): ?GeneralGuild
    {
        return $this->guild3;
    }

    /**
     * @param GeneralGuild|null $guild3
     *
     * @return $this
     */
    public function setGuild3(?GeneralGuild $guild3): AllianceInterface
    {
        $this->guild3 = $guild3;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild4(): ?GeneralGuild
    {
        return $this->guild4;
    }

    /**
     * @param GeneralGuild|null $guild4
     *
     * @return $this
     */
    public function setGuild4(?GeneralGuild $guild4): AllianceInterface
    {
        $this->guild4 = $guild4;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild5(): ?GeneralGuild
    {
        return $this->guild5;
    }

    /**
     * @param GeneralGuild|null $guild5
     *
     * @return $this
     */
    public function setGuild5(?GeneralGuild $guild5): AllianceInterface
    {
        $this->guild5 = $guild5;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild6(): ?GeneralGuild
    {
        return $this->guild6;
    }

    /**
     * @param GeneralGuild|null $guild6
     *
     * @return $this
     */
    public function setGuild6(?GeneralGuild $guild6): AllianceInterface
    {
        $this->guild6 = $guild6;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild7(): ?GeneralGuild
    {
        return $this->guild7;
    }

    /**
     * @param GeneralGuild|null $guild7
     *
     * @return $this
     */
    public function setGuild7(?GeneralGuild $guild7): AllianceInterface
    {
        $this->guild7 = $guild7;
        return $this;
    }

    /**
     * @return GeneralGuild|null
     */
    public function getGuild8(): ?GeneralGuild
    {
        return $this->guild8;
    }

    /**
     * @param GeneralGuild|null $guild8
     *
     * @return $this
     */
    public function setGuild8(?GeneralGuild $guild8): AllianceInterface
    {
        $this->guild8 = $guild8;
        return $this;
    }

}