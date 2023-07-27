<?php

namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingCamp
 *
 * @ORM\Table(name="_TrainingCamp")
 * @ORM\Entity()
 */
class TrainingCamp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="Rank", type="integer", nullable=false)
     */
    private $rank;

    /**
     * @var integer
     *
     * @ORM\Column(name="GraduateCount", type="integer", nullable=false)
     */
    private $graduateCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="EvaluationPoint", type="integer", nullable=false)
     */
    private $evaluationPoint;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return int
     */
    public function getGraduateCount()
    {
        return $this->graduateCount;
    }

    /**
     * @param int $graduateCount
     * @return self
     */
    public function setGraduateCount($graduateCount)
    {
        $this->graduateCount = $graduateCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getEvaluationPoint()
    {
        return $this->evaluationPoint;
    }

    /**
     * @param int $evaluationPoint
     * @return self
     */
    public function setEvaluationPoint($evaluationPoint)
    {
        $this->evaluationPoint = $evaluationPoint;
        return $this;
    }

}