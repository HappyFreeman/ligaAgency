<?php

namespace App\Repositories;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\DTO\CatalogFilterDTO;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductsRepository implements ProductsRepositoryContract
{
    public function __construct(private readonly Product $model)
    {
    }

    public function getModel(): Product
    {
        return $this->model;
    }

    public function findAll(): Collection
    {
        return $this->getModel()->get();
    }

    public function getById(int $id, array $relations = []): Product
    {
        return $this->getModel()
            ->when($relations, fn ($query) => $query->with($relations))
            ->findOrFail($id)
        ;
    }

    public function create(array $fields): Product
    {
        return $this->getModel()->create($fields);
    }

    public function update(Product $product, array $fields): Product
    {
        $product->update($fields);

        return $product;
    }

    public function delete(int $id): void
    {
        $this->getModel()->where('id', $id)->delete();
    }

    
    public function paginateForCatalog(
        CatalogFilterDTO $catalogFilterDTO,
        int $perPage = 10,
        int $page = 1,
        array $fields = ['*'],
        string $pageName = 'page',
        array $relations = []
    ): LengthAwarePaginator {
        
        return $this
            ->catalogQuery($catalogFilterDTO)
            ->with($relations)
            ->paginate($perPage, $fields, $pageName, $page)
        ;
    }

    private function catalogQuery(CatalogFilterDTO $catalogFilterDTO): Builder
    {
        return $this
            ->getModel()
            ->when($catalogFilterDTO->getName() !== null, fn ($query) => $query->where('name', 'like', '%' . $catalogFilterDTO->getName() . '%')) // фильтр
        ;
    }
    
}
