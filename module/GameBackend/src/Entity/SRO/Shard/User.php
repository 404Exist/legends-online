<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="_User")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\User")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="UserJID", type="integer", nullable=false)
     */
    private $jid;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     */
    private $charId;

    /**
     * @return int
     */
    public function getJid()
    {
        return $this->jid;
    }

    /**
     * @param int $jid
     *
     * @return User
     */
    public function setJid($jid)
    {
        $this->jid = $jid;
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
     *
     * @return User
     */
    public function setCharId($charId)
    {
        $this->charId = $charId;
        return $this;
    }


}