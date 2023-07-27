<?php

namespace GameBackend\Entity\CrossFire;

use Doctrine\ORM\Mapping as ORM;
use GameBackend\Entity\User\UserInterface;

/**
 * CF_BILLING_USER
 *
 * @ORM\Table(name="CF_BILLING_USER")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\CrossFire\Repository\Billing")
 */
class Billing
{

    /**
     * @var integer
     *
     * @ORM\Column(name="USN", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $usn = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="CASH", type="bigint", nullable=false)
     */
    private $cash = 0;

    /**
     * @param null $user
     */
    public function __construct($user = null)
    {
        if ($user instanceof UserInterface) {
            $this->setUsn($user->getBackendId());
        }
    }


    /**
     * @return int
     */
    public function getUsn()
    {
        return $this->usn;
    }

    /**
     * @param int $usn
     *
     * @return Billing
     */
    public function setUsn($usn)
    {
        $this->usn = $usn;

        return $this;
    }

    /**
     * @return int
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * @param int $cash
     *
     * @return Billing
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }
}