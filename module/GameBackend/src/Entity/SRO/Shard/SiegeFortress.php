<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\Game\GuildInterface;

/**
 * SiegeFortress
 *
 * @ORM\Table(name="_SiegeFortress")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\SiegeFortress")
 */
class SiegeFortress
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="FortressID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="Guild", fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(name="GuildID", referencedColumnName="ID")
     */
    private $guild;

    /**
     * @var integer
     *
     * @ORM\Column(name="TaxRatio", type="smallint", nullable=false)
     */
    private $taxRatio;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return SiegeFortress
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Guild
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param GuildInterface $guild
     * @return SiegeFortress
     */
    public function setGuild(GuildInterface $guild)
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * @return int
     */
    public function getTaxRatio()
    {
        return $this->taxRatio;
    }

    /**
     * @param int $taxRatio
     * @return SiegeFortress
     */
    public function setTaxRatio($taxRatio)
    {
        $this->taxRatio = $taxRatio;

        return $this;
    }


}