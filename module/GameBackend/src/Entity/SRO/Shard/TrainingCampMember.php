<?php

namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrainingCampMember
 *
 * @ORM\Table(name="_TrainingCampMember")
 * @ORM\Entity()
 */
class TrainingCampMember
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CampID", type="integer", nullable=false)
     * @ORM\Id
     */
    private $id;

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
     * @ORM\Column(name="MemberClass", type="integer", nullable=false)
     */
    private $memberClass;

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
     * @return Character
     */
    public function getChar()
    {
        return $this->char;
    }

    /**
     * @param Character $char
     * @return self
     */
    public function setChar($char)
    {
        $this->char = $char;
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
     * @return self
     */
    public function setMemberClass($memberClass)
    {
        $this->memberClass = $memberClass;
        return $this;
    }

}