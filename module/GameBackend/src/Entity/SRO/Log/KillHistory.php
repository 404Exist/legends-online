<?php

namespace GameBackend\Entity\SRO\Log;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * KillHistory
 *
 * @ORM\Table(name="_KillHistory")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\SRO\Log\Repository\KillHistory")
 */
class KillHistory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CharID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $charId = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="DeathCharId", type="integer", nullable=false)
     */
    private $deathCharId = 0;
}