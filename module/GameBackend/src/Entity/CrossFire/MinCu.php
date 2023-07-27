<?php

namespace GameBackend\Entity\CrossFire;


use Doctrine\ORM\Mapping as ORM;

/**
 * MinCu
 *
 * @ORM\Table(name="CF_MIN_CU")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\CrossFire\Repository\MinCu")
 */
class MinCu
{

    /**
     * @var integer
     *
     * @ORM\Column(name="SERVER", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="SERVER_WEB_NAME", type="string", length=255, nullable=false)
     */
    private $serverName;

    /**
     * @var integer
     *
     * @ORM\Column(name="CONNECT_CNT", type="integer", nullable=false)
     */
    private $connections;

    /**
     * @return int
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param int $server
     *
     * @return MinCu
     */
    public function setServer($server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getServerName()
    {
        return $this->serverName;
    }

    /**
     * @param mixed $serverName
     *
     * @return MinCu
     */
    public function setServerName($serverName)
    {
        $this->serverName = $serverName;

        return $this;
    }

    /**
     * @return int
     */
    public function getConnections()
    {
        return $this->connections;
    }

    /**
     * @param int $connections
     *
     * @return MinCu
     */
    public function setConnections($connections)
    {
        $this->connections = $connections;

        return $this;
    }


}