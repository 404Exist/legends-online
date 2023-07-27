<?php


namespace GameBackend\Entity\Metin\Account;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUser
 *
 * @ORM\Table(name="account")
 * @ORM\Entity(repositoryClass="GameBackend\Entity\Metin\Account\Repository\Account")
 */
class Account
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=30, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=64, nullable=false)
     */
    private $email = '';

    /**
     * @var int
     *
     * @ORM\Column(name="cash", type="int", length=11, nullable=false)
     */
    private $cash = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="rang", type="int", length=4, nullable=false)
     */
    private $rang = 1;

    /**
     * @var \Datetime
     *
     * @ORM\Column(name="create_time", type="Datetime", length=4, nullable=false)
     */
    private $createTime;

    public function __construct()
    {
        $this->createTime = new \DateTime();
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
     * @return Account
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return Account
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Account
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * @return Account
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * @return int
     */
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * @param int $rang
     * @return Account
     */
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param \Datetime $createTime
     * @return Account
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;

        return $this;
    }


}