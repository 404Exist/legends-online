<?php


namespace GameBackend\Entity\Metin\Account\Repository;


use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\User\UserInterface;

class Account extends EntityRepository
{

    /**
     * @param $userId
     * @param $password
     *
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function setPassword($userId, $password)
    {
        $sql = "UPDATE account SET password = password(?) WHERE id = ?";
        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute([$password, $userId]);

        return $stmt->fetch();
    }

    /**
     * @param UserInterface $user
     * @return null|\GameBackend\Entity\Metin\Account\Account
     */
    public function getUser(UserInterface $user)
    {
        return $this->findOneBy(['id' => $user->getBackendId()]);
    }

    /**
     * @param string $username
     * @return null|\GameBackend\Entity\Metin\Account\Account
     */
    public function getUser4Username($username)
    {
        return $this->findOneBy(['login' => $username]);
    }
}