<?php

namespace App\Http\Controllers\Api\V1;

use App\Dto\ListProductsFiltersDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\products\ListProductsRequest;
use App\Http\Resources\products\ListProductsResource;
use App\Services\ProductService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductService $productService,
    ) {}

    /**
     * List products
     */
    public function listProducts(ListProductsRequest $request): ResourceCollection
    {
        $filtersDto = new ListProductsFiltersDto(...$request->validated());
        $products = $this->productService->listProducts($filtersDto);

        return ListProductsResource::collection($products);
    }
}
