<?php

namespace App\Repository;

use App\DTO\TurnoverItem\ClientTotalValuesDTO;
use App\DTO\TurnoverItem\ClientItemsDTO;
use App\Entity\Client;
use App\Entity\TurnoverItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class TurnoverItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TurnoverItem::class);
    }

    public function getClientItemsQB(Client $client, ClientItemsDTO $filters): QueryBuilder
    {
        $qb = $this->createQueryBuilder('ti');

        $qb->select('ti')
            ->leftJoin('ti.turnover', 't')
            ->leftJoin('t.client', 'c')
            ->where('c = :client')
            ->setParameter('client', $client);

        if ($filters->fromDate !== null) {
            $qb->andWhere('t.documentDate >= :fromDate')
                ->setParameter('fromDate', $filters->fromDate);
        }

        if ($filters->toDate !== null) {
            $qb->andWhere('t.documentDate <= :toDate')
                ->setParameter('toDate', $filters->toDate);
        }

        if ($filters->countryId !== null) {
            $qb->andWhere('t.vatCountry = :vatCountry')
                ->setParameter('vatCountry', $filters->countryId);
        }

        if ($filters->isOss !== null) {
            $qb->andWhere('t.isOss = :isOss')
                ->setParameter('isOss', $filters->isOss);
        }

        return $qb;
    }

    public function getClientTotalValues(Client $client): ClientTotalValuesDTO
    {
        $qb = $this->createQueryBuilder('ti');

        $qb->select('COUNT(ti.id) as invoiceTotalTransactions')
            ->addSelect('SUM(ti.invoiceTotalNetAmountEUR) as totalNetAmountEUR')
            ->addSelect('SUM(ti.invoiceTotalBruttoAmountEUR) as invoiceTotalBruttoAmountEUR')
            ->addSelect('SUM(ti.invoiceTotalVatAmountEUR) as invoiceTotalVatAmountEUR')
            ->leftJoin('ti.turnover', 't')
            ->leftJoin('t.client', 'c')
            ->where('c = :client')
            ->setParameter('client', $client);

        $result = $qb->getQuery()->getSingleResult();

        $dto = new ClientTotalValuesDTO();
        $dto->totalTransactions = $result['invoiceTotalTransactions'];
        $dto->totalNetto = $result['totalNetAmountEUR'] ?: 0;
        $dto->totalBrutto = $result['invoiceTotalBruttoAmountEUR'] ?: 0;
        $dto->totalVatAmount = $result['invoiceTotalVatAmountEUR'] ?: 0;

        return $dto;
    }
}
