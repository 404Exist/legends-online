<?php


namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefObjItem
 *
 * @ORM\Table(name="_RefMagicOpt")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\RefMagicOpt")
 */
class RefMagicOpt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="MOptName128", type="string", nullable=false)
     */
    private $optName;

    /**
     * @var int
     *
     * @ORM\Column(name="service", type="integer", nullable=false)
     */
    private $service;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOptName()
    {
        return $this->optName;
    }

    /**
     * @param string $optName
     * @return $this
     */
    public function setOptName($optName)
    {
        $this->optName = $optName;
        return $this;
    }

    /**
     * @return int
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param int $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

}