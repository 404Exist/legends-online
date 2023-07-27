<?php

namespace GameBackend\Entity\SRO\Account;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacity
 *
 * @ORM\Table(name="_ShardCurrentUser")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Account\Repository\Capacity")
 */
class Capacity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUSerCount", type="integer", nullable=false)
     */
    private $countPlayer = 0;

    /**
     * @return int
     */
    public function getId(): int
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
    public function getCountPlayer()
    {
        return $this->countPlayer;
    }

    /**
     * @param int $countPlayer
     * @return self
     */
    public function setCountPlayer($countPlayer)
    {
        $this->countPlayer = $countPlayer;
        return $this;
    }


}