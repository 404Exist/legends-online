<?php

namespace PServerCore\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NEWS
 */
class News extends EntityRepository
{
    /**
     * @return null|\PServerCore\Entity\News[]
     */
    public function getNews()
    {
        return $this->getQueryBuilder()
            ->getQuery()
            ->getResult();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->createQueryBuilder('p')
            ->select('p', 'user', 'translateLocale')
            ->join('p.user', 'user')
            ->leftJoin('p.translateLocale', 'translateLocale')
            ->orderBy('p.release', 'desc');
    }

    /**
     * @param $newsId
     *
     * @return null|\PServerCore\Entity\News
     */
    public function getNews4Id($newsId)
    {
        $query = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.id = :newsId')
            ->setParameter('newsId', $newsId)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}