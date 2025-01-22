<?php

namespace App\DTO;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CatalogDataDTO
{
    public function __construct(
        public readonly CatalogFilterDTO $filter,
        public readonly LengthAwarePaginator $products,
    ) {
    }
}