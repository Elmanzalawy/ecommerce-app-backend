<?php

namespace App\Services;

use App\Dto\ListProductsFiltersDto;
use App\Repositories\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function __construct(
        protected readonly ProductRepository $productRepository,
    ) {}

    public function listProducts(ListProductsFiltersDto $filters): LengthAwarePaginator
    {
        return $this->productRepository->listProducts($filters);
    }
}
