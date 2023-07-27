<?php

namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingCampHonorRank
 *
 * @ORM\Table(name="_TrainingCampHonorRank")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\TrainingCampHonorRank")
 */
class TrainingCampHonorRank
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Ranking", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ranking;

    /**
     * @var integer
     *
     * @ORM\Column(name="Rank", type="integer", nullable=false)
     */
    private $rank;

    /**
     * @var TrainingCampMember
     *
     * @ORM\OneToOne(targetEntity="TrainingCampMember")
     * @ORM\JoinColumn(name="CampID", referencedColumnName="CampID")
     **/
    private $master;

    /**
     * @var TrainingCamp
     *
     * @ORM\OneToOne(targetEntity="TrainingCamp")
     * @ORM\JoinColumn(name="CampID", referencedColumnName="ID")
     **/
    private $camp;

    /**
     * @return int
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * @param int $ranking
     * @return self
     */
    public function setRanking($ranking)
    {
        $this->ranking = $ranking;
        return $this;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     * @return self
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
        return $this;
    }

    /**
     * @return TrainingCampMember
     */
    public function getMaster()
    {
        return $this->master;
    }

    /**
     * @param TrainingCampMember $master
     * @return self
     */
    public function setMaster($master)
    {
        $this->master = $master;
        return $this;
    }

    /**
     * @return TrainingCamp
     */
    public function getCamp()
    {
        return $this->camp;
    }

    /**
     * @param TrainingCamp $camp
     * @return self
     */
    public function setCamp($camp)
    {
        $this->camp = $camp;
        return $this;
    }

}