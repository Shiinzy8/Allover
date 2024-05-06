<?php

namespace App\Validator\TurnoverItem;

use App\Repository\CountryRepository;
use DateTime;

class GetClientItemsRequestValidator
{
    private CountryRepository $repository;

    public function __construct(CountryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function validate(array $parameters): array
    {
        $errors = [];

        $fromDate = $parameters['from_date'] ?? null;
        if ($fromDate !== null && ! $this->validateDateFormat($fromDate)) {
            $errors[] = 'Invalid from_date format. Use YYYY-MM-DD';
        }

        $toDate = $parameters['to_date'] ?? null;
        if ($toDate !== null && ! $this->validateDateFormat($toDate)) {
            $errors[] = 'Invalid to_date format. Use YYYY-MM-DD';
        }

        $countryId = $parameters['country_id'] ?? null;
        if ($countryId !== null
            && (filter_var($countryId, FILTER_VALIDATE_INT) === false
                || $this->repository->validCountry((int) $countryId) === null)
        ) {
            $errors[] = 'Invalid country id';
        }

        $isOss = $parameters['iss_oss'] ?? null;
        if ($isOss !== null && filter_var($isOss, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) === null) {
            $errors[] = 'is_oss should be a boolean';
        }

        $page = $parameters['page'] ?? null;
        if ($page !== null && filter_var($page, FILTER_VALIDATE_INT) === false) {
            $errors[] = 'page should be an integer';
        }
        if ($page !== null && $page < 1) {
            $errors[] = 'page can\`t be less then 1';
        }

        $size = $parameters['size'] ?? null;
        if ($size !== null && filter_var($size, FILTER_VALIDATE_INT) === false) {
            $errors[] = 'size should be an integer, or null if page is null';
        }
        if ($size !== null && ($size < 1 || $size > 1000)) {
            $errors[] = 'size can\`t be less then 1 or bigger then 100';
        }

        return $errors;
    }

    private function validateDateFormat(string $date): bool
    {
        $checkDate = DateTime::createFromFormat('Y-m-d', $date);
        return $checkDate !== false && $checkDate->format('Y-m-d') === $date;
    }
}
