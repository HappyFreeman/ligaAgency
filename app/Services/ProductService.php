<?php

namespace App\Services;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\Models\Product;

class ProductService implements ProductCreationServiceContract, ProductRemoverServiceContract, ProductUpdateServiceContract
{
    public function __construct(
        private readonly ProductsRepositoryContract $productsRepository,
    ) {
    }

    public function create(array $fields): Product
    {
        $product = $this->productsRepository->create($fields);

        return $product;
    }

    public function update(int $id, array $fields): Product
    {
        $product = $this->productsRepository->getById($id);

        $this->productsRepository->update($product, $fields);

        return $product;
    }

    public function delete(int $id)
    {
        //$product = $this->productsRepository->getById($id);

        $this->productsRepository->delete($id);
    }
}
