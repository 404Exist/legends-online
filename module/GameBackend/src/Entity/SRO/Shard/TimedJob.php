<?php
declare(strict_types=1);

namespace GameBackend\Entity\SRO\Shard;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimedJob
 *
 * @ORM\Table(name="_TimedJob")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Shard\Repository\TimedJob")
 */
class TimedJob
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): TimedJob
    {
        $this->id = $id;
        return $this;
    }

}