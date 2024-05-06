<?php

namespace App\Repository;

use App\DTO\Tunrover\ClientDatesDTO;
use App\Entity\Client;
use App\Entity\Turnover;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TurnoverRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Turnover::class);
    }

    public function getClientDatesFilter(Client $client): ClientDatesDTO
    {
        $qb = $this->createQueryBuilder('t');

        $qb->select('MAX(t.documentDate) as maxDate', 'MIN(t.documentDate) as minDate')
            ->where('t.client = :client')
            ->setParameter('client', $client);

        $result = $qb->getQuery()->getSingleResult();

        $dto = new ClientDatesDTO();
        $dto->maxDate = $result['maxDate'] ? DateTime::createFromFormat('Y-m-d', $result['maxDate']) : null;
        $dto->minDate = $result['minDate'] ? DateTime::createFromFormat('Y-m-d', $result['minDate']) : null;

        return $dto;
    }

    public function getClientCountriesFilter(Client $client): array
    {
        return $this->createQueryBuilder('t')
            ->select('c.id', 'c.name')
            ->innerJoin('t.vatCountry', 'c')
            ->where('t.client = :client')
            ->andWhere('c.isEu = true')
            ->groupBy('c.id')
            ->setParameter('client', $client)
            ->getQuery()
            ->getResult();
    }
}
