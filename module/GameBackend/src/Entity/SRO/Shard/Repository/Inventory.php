<?php

namespace GameBackend\Entity\SRO\Shard\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

class Inventory extends EntityRepository
{
    /**
     * @param $characterId
     *
     * @return \GameBackend\Entity\SRO\Shard\Inventory[]|null
     */
    public function getInventorySet4CharacterId($characterId)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p', 'item', 'refItem', 'binding', 'itemDetail')
            ->join('p.item', 'item')
            ->join('item.refItem', 'refItem')
            ->join('refItem.itemDetail', 'itemDetail')
            ->leftJoin('item.bindOptionWhiteItem', 'binding', Join::WITH, 'binding.optValue > 0')
            ->where('p.char = :char')
            ->setParameter('char', $characterId)
            ->andWhere('p.slot < 13 and p.slot != 8')
            ->andWhere('p.item > 0')
            ->orderBy('p.slot', 'asc')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * @param $characterId
     * @param $slot
     * @return \GameBackend\Entity\SRO\Shard\Inventory|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getInventorySlot($characterId, $slot)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.char = :char')
            ->andWhere('p.slot = :slot')
            ->setParameter('char', $characterId)
            ->setParameter('slot', $slot)
            ->andWhere('p.item > 0')
            ->getQuery();

        return $query->getOneOrNullResult();
    }

}