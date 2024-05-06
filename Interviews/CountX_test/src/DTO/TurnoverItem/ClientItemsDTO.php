<?php

namespace App\DTO\TurnoverItem;

use DateTime;
use Symfony\Component\HttpFoundation\Request;

class ClientItemsDTO
{
    public ?DateTime $fromDate;

    public ?DateTime $toDate;

    public ?string $countryId;

    public ?bool $isOss;

    public ?int $page;

    public ?int $size;

    public static function createFromRequest(array $parameters): self
    {
        $dto = new self();

        $dto->fromDate = null;
        if ($parameters['from_data'] ?? null) {
            $dto->fromDate = DateTime::createFromFormat('Y-m-d', $parameters['from_date']);
        }

        $dto->toDate = null;
        if ($parameters['to_date'] ?? null) {
            $dto->toDate = DateTime::createFromFormat('Y-m-d', $parameters['to_date']);
        }

        $dto->countryId = $parameters['country_id'] ?? null;
        $dto->isOss = $parameters['is_oss'] ?? null;
        $dto->page = $parameters['page'] ?? 1;
        $dto->size = $parameters['size'] ?? 100;

        return $dto;
    }
}
