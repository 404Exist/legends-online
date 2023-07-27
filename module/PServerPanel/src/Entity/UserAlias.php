<?php

namespace PServerPanel\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAlias
 * @ORM\Table(name="user_alias")
 * @ORM\Entity(repositoryClass="PServerPanel\Entity\Repository\UserAlias")
 */
class UserAlias
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \SmallUser\Entity\UserInterface
     * @ORM\ManyToOne(targetEntity="PServerCore\Entity\User",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_usrId", referencedColumnName="usrId", nullable=false)
     * })
     */
    private $user;

    /**
     * @var integer
     * @ORM\Column(name="char_id", type="integer", nullable=false)
     */
    private $charId;

    /**
     * @var string
     * @ORM\Column(name="char_name", type="string", length=100, nullable=false)
     */
    private $charName;

    /**
     * @return \SmallUser\Entity\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \SmallUser\Entity\UserInterface $user
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
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
    public function getCharId()
    {
        return $this->charId;
    }

    /**
     * @param int $charId
     * @return self
     */
    public function setCharId($charId)
    {
        $this->charId = $charId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharName()
    {
        return $this->charName;
    }

    /**
     * @param string $charName
     * @return self
     */
    public function setCharName($charName)
    {
        $this->charName = $charName;
        return $this;
    }


}