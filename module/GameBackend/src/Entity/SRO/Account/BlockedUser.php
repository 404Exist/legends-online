<?php

namespace GameBackend\Entity\SRO\Account;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlockedUser
 *
 * @ORM\Table(name="_BlockedUser")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Account\Repository\BlockedUser")
 */
class BlockedUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserJID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $userjid;

    /**
     * @var string
     *
     * @ORM\Column(name="UserID", type="string", length=128, nullable=false)
     */
    private $userid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Type", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="SerialNo", type="integer", nullable=false)
     */
    private $serialno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeBegin", type="datetime", nullable=false)
     */
    private $timebegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeEnd", type="datetime", nullable=false)
     */
    private $timeend;

    /**
     * @param int $serialno
     *
     * @return BlockedUser
     */
    public function setSerialNo($serialno)
    {
        $this->serialno = $serialno;

        return $this;
    }

    /**
     * @return int
     */
    public function getSerialNo()
    {
        return $this->serialno;
    }

    /**
     * @param \DateTime $timebegin
     *
     * @return BlockedUser
     */
    public function setTimeBegin($timebegin)
    {
        $this->timebegin = $timebegin;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeBegin()
    {
        return $this->timebegin;
    }

    /**
     * @param \DateTime $timeend
     *
     * @return BlockedUser
     */
    public function setTimeEnd($timeend)
    {
        $this->timeend = $timeend;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeend;
    }

    /**
     * @param int $type
     *
     * @return BlockedUser
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $userid
     *
     * @return BlockedUser
     */
    public function setUserId($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userid;
    }

    /**
     * @param int $userjid
     *
     * @return BlockedUser
     */
    public function setUserJid($userjid)
    {
        $this->userjid = $userjid;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserJid()
    {
        return $this->userjid;
    }


}
