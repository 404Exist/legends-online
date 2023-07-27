<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * SiegeFortress
 *
 * @ORM\Table(name="_CharTrijob")
 * @ORM\Entity()
 */
class CharTriJob
{
    /**
     * @var Character
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Character")
     * @ORM\JoinColumn(name="CharID", referencedColumnName="CharID")
     **/
    private $char;

    /**
     * @var integer
     *
     * @ORM\Column(name="JobType", type="smallint", length=64, nullable=false)
     */
    private $jobType = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Level", type="smallint", nullable=false)
     */
    private $level = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="Exp", type="integer", nullable=false)
     */
    private $exp = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="Contribution", type="integer", nullable=false)
     */
    private $contribution = 1;

    /**
     * @return Character
     */
    public function getChar()
    {
        return $this->char;
    }

    /**
     * @param Character $char
     * @return CharTriJob
     */
    public function setChar($char)
    {
        $this->char = $char;

        return $this;
    }

    /**
     * @return int
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * @param int $jobType
     * @return CharTriJob
     */
    public function setJobType($jobType)
    {
        $this->jobType = $jobType;

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
     * @return CharTriJob
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return int
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param int $exp
     * @return CharTriJob
     */
    public function setExp($exp)
    {
        $this->exp = $exp;

        return $this;
    }

    /**
     * @return int
     */
    public function getContribution()
    {
        return $this->contribution;
    }

    /**
     * @param int $contribution
     * @return CharTriJob
     */
    public function setContribution($contribution)
    {
        $this->contribution = $contribution;

        return $this;
    }

}