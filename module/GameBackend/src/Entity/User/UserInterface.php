<?php
namespace GameBackend\Entity\User;

/**
 * Interface UserInterface
 * @package GameBackend\Entity\User
 */
interface UserInterface
{

    /**
     * @return int
     */
    public function getBackendId();

    /**
     * @param int $backendId
     * @return self
     */
    public function setBackendId($backendId);

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @param string $username
     * @return self
     */
    public function setUsername($username);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param string $password
     * @return self
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getCreateIp();

    /**
     * @param string $ip
     * @return self
     */
    public function setCreateIp($ip);

}