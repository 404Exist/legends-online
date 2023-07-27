<?php

namespace GameBackend\Entity\CrossFire;

use Doctrine\ORM\Mapping as ORM;

/**
 * CF_MEMBER
 *
 * @ORM\Table(name="CF_MEMBER")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\CrossFire\Repository\Member")
 */
class Member
{

    /**
     * @var integer
     *
     * @ORM\Column(name="USN", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usn;

    /**
     * @var string
     *
     * @ORM\Column(name="USER_ID", type="string", length=12, nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="LUSER_ID", type="string", length=12, nullable=true)
     */
    private $lUserId;

    /**
     * @var string
     *
     * @ORM\Column(name="USER_PASS", type="string", length=64, nullable=true)
     */
    private $userPass;

    /**
     * @var int
     *
     * @ORM\Column(name="ISPROMOUSER", type="smallint", nullable=true)
     */
    private $isPromoUser;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Member
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getIsPromoUser()
    {
        return $this->isPromoUser;
    }

    /**
     * @param int $isPromoUser
     *
     * @return Member
     */
    public function setIsPromoUser($isPromoUser)
    {
        $this->isPromoUser = $isPromoUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getLUserId()
    {
        return $this->lUserId;
    }

    /**
     * @param string $lUserId
     *
     * @return Member
     */
    public function setLUserId($lUserId)
    {
        $this->lUserId = $lUserId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     *
     * @return Member
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserPass()
    {
        return $this->userPass;
    }

    /**
     * @param string $userPass
     *
     * @return Member
     */
    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;

        return $this;
    }

    /**
     * @return int
     */
    public function getUsn()
    {
        return $this->usn;
    }

} 