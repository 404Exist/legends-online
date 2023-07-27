<?php
declare(strict_types=1);

namespace PServerCore\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class TranslationLocale extends EntityRepository
{
    public function getLocaleMapping(bool $activeOnly = true): array
    {
        $queryBuilder = $this->createQueryBuilder('tl')
            ->select('tl.locale, tl.name')
            ->orderBy('tl.id', 'asc');

        if ($activeOnly === true) {
            $queryBuilder->where('tl.active = 1');
        }

        return array_column($queryBuilder->getQuery()->getArrayResult(), 'name', 'locale');
    }
}