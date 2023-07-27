<?php

namespace PServerPanel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoteHistory
 * @ORM\Table(name="vote_history")
 * @ORM\Entity(repositoryClass="PServerPanel\Entity\Repository\VoteHistory")
 */
class VoteHistory
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var VoteSites
     * @ORM\ManyToOne(targetEntity="PServerPanel\Entity\VoteSites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vote_site", referencedColumnName="id")
     * })
     */
    private $voteSite;

    /**
     * @var \SmallUser\Entity\UserInterface
     * @ORM\ManyToOne(targetEntity="PServerCore\Entity\User",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_usrId", referencedColumnName="usrId", nullable=false)
     * })
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(name="ip", type="string", length=60, nullable=false)
     */
    private $ip;

    /**
     * @var \DateTime
     * @ORM\Column(name="expire", type="datetime", nullable=false)
     */
    private $expire;

    /**
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * VoteHistory constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return VoteHistory
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return VoteSites
     */
    public function getVoteSite()
    {
        return $this->voteSite;
    }

    /**
     * @param VoteSites $voteSite
     * @return VoteHistory
     */
    public function setVoteSite($voteSite)
    {
        $this->voteSite = $voteSite;

        return $this;
    }

    /**
     * @return \SmallUser\Entity\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \SmallUser\Entity\UserInterface $user
     * @return VoteHistory
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return VoteHistory
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * @param \DateTime $expire
     * @return VoteHistory
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return VoteHistory
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }


}
