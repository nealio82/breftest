<?php

namespace App\Repository;

use App\Entity\Quote;
use Doctrine\ORM\EntityRepository;

class QuoteRepository extends EntityRepository
{
    public function getRandomQuote(): Quote
    {
        $quote = $this->createQueryBuilder('q')
            ->select('q', 'k')
            ->innerJoin('q.kitty', 'k')
            ->setMaxResults(1)
            ->orderBy('RAND()')
            ->getQuery()
            ->getSingleResult();

        return $quote;
    }

    public function getQuotesNotIncluding(Quote $excludedQuote, int $max = 5): array
    {
        $quotes = $this->createQueryBuilder('q')
            ->select('q', 'k')
            ->innerJoin('q.kitty', 'k')
            ->andWhere('q.id != :id')
            ->setMaxResults($max)
            ->setParameter('id', $excludedQuote->getId())
            ->getQuery()
            ->getResult();

        return $quotes;
    }
}