<?php

namespace App\Controller;

use App\DTO\TurnoverItem\ClientItemsDTO;
use App\Entity\Client;
use App\Repository\CountryRepository;
use App\Repository\TurnoverItemRepository;
use App\Repository\TurnoverRepository;
use App\Transformer\Turnover\ClientDatesTransformer;
use App\Transformer\TurnoverItem\ClientItemsTransformer;
use App\Transformer\TurnoverItem\ClientTotalValuesTransformer;
use App\Validator\TurnoverItem\GetClientItemsRequestValidator;
use Doctrine\ORM\Tools\Pagination\Paginator;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/turnover_item/", name="app_turnover_item_")
 */
class TurnoverItemController extends AbstractFOSRestController
{
    /**
     * @Route("{client}", name="client_items", methods={"GET"})
     */
    public function getClientItems(
        Client $client,
        Request $request,
        GetClientItemsRequestValidator $validator,
        TurnoverItemRepository $repository,
        ClientItemsTransformer $transformer,
    ): JsonResponse
    {
        $errors = $validator->validate($request->query->all());

        if (! empty($errors)) {
            return $this->json(['message' => $errors], Response::HTTP_BAD_REQUEST);
        }

        $filters = ClientItemsDTO::createFromRequest($request->query->all());

        $qb = $repository->getClientItemsQB($client, $filters);
        $qb->setFirstResult($filters->size * ($filters->page - 1))->setMaxResults($filters->size);

        $paginator = new Paginator($qb);
        $totalItems = count($paginator);

        return $this->json([
            'items' => $transformer->transform($paginator->getQuery()->getResult()),
            'total' => $totalItems,
            'pages' => (int) ceil($totalItems / $filters->size),
            'current_page' => $filters->page,
            'items_per_page' => $filters->size,
        ]);
    }

    /**
     * @Route("{client}/total_values", name="client_total_values", methods={"GET"})
     */
    public function getClientTotalValues(
        Client $client,
        TurnoverItemRepository $repository,
        ClientTotalValuesTransformer $transformer,
    ): JsonResponse
    {
        return $this->json($transformer->transform($repository->getClientTotalValues($client)));
    }

    /**
     * @Route("{client}/filters", name="client_filters", methods={"GET"})
     */
    public function getClientItemsFilters(
        Client $client,
        TurnoverRepository $turnoverRepository,
        ClientDatesTransformer $clientDatesTransformer,
    ): JsonResponse
    {
        $dates = $turnoverRepository->getClientDatesFilter($client);
        $countries = array_map(function(array $item) {
            return [
                'key' => $item['name'] ?? null,
                'value' => $item['id'] ?? null,
            ];
        }, $turnoverRepository->getClientCountriesFilter($client));

        return $this->json([
            'countries' => $countries,
            'dates' => $clientDatesTransformer->transform($dates),
        ]);
    }
}
