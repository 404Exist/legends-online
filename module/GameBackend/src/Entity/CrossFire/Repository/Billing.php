<?php


namespace GameBackend\Entity\CrossFire\Repository;

use Doctrine\ORM\EntityRepository;
use GameBackend\Entity\User\UserInterface;

class Billing extends EntityRepository
{

    /**
     * @param UserInterface $user
     *
     * @return \GameBackend\Entity\CrossFire\Billing|null
     */
    public function getEntry4User(UserInterface $user)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.usn = :usn')
            ->setParameter('usn', $user->getBackendId())
            ->getQuery();

        $result = null;
        try {
            $result = $query->getOneOrNullResult();
        } catch (\Exception $e) {

        }

        return $result;
    }

}