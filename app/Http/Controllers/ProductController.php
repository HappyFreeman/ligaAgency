<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ProductsRepositoryContract;
use App\Contracts\Services\CatalogDataCollectorServiceContract;
use App\Contracts\Services\ProductCreationServiceContract;
use App\Contracts\Services\ProductRemoverServiceContract;
use App\Contracts\Services\ProductUpdateServiceContract;
use App\DTO\CatalogFilterDTO;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function __construct(private readonly ProductsRepositoryContract $productsRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        CatalogDataCollectorServiceContract $catalogDataCollectorService
    ): Factory|View|Application {
        // Policy вроде не требуется
        //$products = $this->productsRepository->findAll();

        $catalogFilterDTO = (new CatalogFilterDTO())
            ->setName($request->get('name'))
        ;

        $productsData = $catalogDataCollectorService->collectCatalogData(
            $catalogFilterDTO,
            10,
            $request->get('page', 1)
        );

        return view('pages.products.list', ['productsData' => $productsData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|View|Application
    {
        return view('pages.products.create', ['product' => $this->productsRepository->getModel()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        ProductRequest $request,
        ProductCreationServiceContract $productCreationService,
    ): RedirectResponse {
        
        $product = $productCreationService->create($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = $this->productsRepository->getById($id);
        
        return view('pages.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductRequest $request,
        ProductUpdateServiceContract $productUpdateService,
        int $id,
    ): RedirectResponse {
        $product = $productUpdateService->update($id, $request->validated());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $id,
        ProductRemoverServiceContract $productRemoverService,
    ): RedirectResponse {
        $productRemoverService->delete($id);
        
        return back();
    }
}
