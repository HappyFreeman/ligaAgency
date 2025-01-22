<?php

namespace App\Contracts\Repositories;

use App\DTO\CatalogFilterDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductsRepositoryContract
{
    public function getModel(): Product;

    public function findAll(): Collection;

    public function getById(int $id, array $relations = []): Product;

    public function create(array $fields): Product;

    public function update(Product $product, array $fields): Product;

    public function delete(int $id): void;


    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        int $perPage = 10,
        int $page = 1,
        array $fields = ['*'],
        string $pageName = 'page',
        array $relations = []
    ): LengthAwarePaginator;
    
}