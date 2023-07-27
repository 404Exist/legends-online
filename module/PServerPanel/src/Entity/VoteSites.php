<?php

namespace PServerPanel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VoteSites
 * @ORM\Table(name="vote_sites")
 * @ORM\Entity(repositoryClass="PServerPanel\Entity\Repository\VoteSites")
 */
class VoteSites
{
    const TYPE_INTERNAL = 0;
    const TYPE_EXTERNAL = 1;
    const TYPE_POSTBACK = 2;

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="url", type="text", nullable=false)
     */
    private $url;

    /**
     * @var int
     * @ORM\Column(name="type", type="smallint", nullable=false)
     */
    private $type;

    /**
     * @var int
     * @ORM\Column(name="coins", type="integer", nullable=false)
     */
    private $coins;

    /**
     * @var int
     * @ORM\Column(name="`top`", type="integer", nullable=false)
     */
    private $top;

    /**
     * @var int
     * @ORM\Column(name="`left`", type="integer", nullable=false)
     */
    private $left;

    /**
     * @var int
     * @ORM\Column(name="delay", type="integer", nullable=false)
     */
    private $delay;

    /**
     * @var int
     * @ORM\Column(name="timeout", type="integer", nullable=false)
     */
    private $timeout;

    /**
     * @var integer
     * @ORM\Column(name="sort_key", type="smallint", nullable=false)
     */
    private $sortKey = 0;

    /**
     * @var int
     * @ORM\Column(name="active", type="smallint", nullable=false)
     */
    private $active;

    /**
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * VoteSites constructor.
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
     * @return VoteSites
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return VoteSites
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return VoteSites
     */
    public function setUrl($url)
    {
        $this->url = $url;

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
     * @param int $type
     * @return VoteSites
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return int
     */
    public function getCoins()
    {
        return $this->coins;
    }

    /**
     * @param int $coins
     * @return VoteSites
     */
    public function setCoins($coins)
    {
        $this->coins = $coins;

        return $this;
    }

    /**
     * @return int
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * @param int $top
     * @return VoteSites
     */
    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * @return int
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param int $left
     * @return VoteSites
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @return int
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param int $delay
     * @return VoteSites
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     * @return VoteSites
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return int
     */
    public function getSortKey()
    {
        return $this->sortKey;
    }

    /**
     * @param int $sortKey
     * @return VoteSites
     */
    public function setSortKey($sortKey)
    {
        $this->sortKey = $sortKey;

        return $this;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return VoteSites
     */
    public function setActive($active)
    {
        $this->active = $active;

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
     * @return VoteSites
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }


}
