<?php

namespace App\Services;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\DTO\CatalogDataDTO;
use App\DTO\CatalogFilterDTO;

class CatalogDataCollectorService implements CatalogDataCollectorServiceContract
{
    public function __construct(
        private readonly ProductsRepositoryContract $productsRepository,
    ){
    }

    public function collectCatalogData(
        CatalogFilterDTO $catalogFilterDTO,
        int $perPage = 10,
        int $page = 1,
        string $pageName = 'page',
        ): CatalogDataDTO {

        $products = $this->productsRepository->paginateForCatalog(
            $catalogFilterDTO,
            $perPage,
            $page,
            ['*'],
            $pageName,
            // N + 1
        );

        return new CatalogDataDTO($catalogFilterDTO, $products);
    }
}
