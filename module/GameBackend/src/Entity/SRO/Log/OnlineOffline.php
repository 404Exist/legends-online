<?php

namespace GameBackend\Entity\SRO\Log;

use Doctrine\ORM\Mapping as ORM;

/**
 * OnlineOffline
 *
 * @ORM\Table(name="_OnlineOffline")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Log\Repository\OnlineOffline")
 */
class OnlineOffline
{
    const TYPE_ONLINE = 'Online';
    const TYPE_OFFLINE = 'Offline';

    /**
     * @var integer
     *
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charId;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=false)
     */
    private $status;

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
     * @return OnlineOffline
     */
    public function setCharId($charId)
    {
        $this->charId = $charId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return OnlineOffline
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }


}