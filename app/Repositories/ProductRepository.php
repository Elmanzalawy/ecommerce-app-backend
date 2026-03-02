<?php

namespace App\Repositories;

use App\Dto\ListProductsFiltersDto;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function __construct() {}

    public function listProducts(ListProductsFiltersDto $filters): LengthAwarePaginator
    {
        return Product::query()
            ->where('is_active', true)
            ->when($filters->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($filters->min_price, function ($query, $min_price) {
                $query->where('price', '>=', $min_price);
            })
            ->when($filters->max_price, function ($query, $max_price) {
                $query->where('price', '<=', $max_price);
            })
            ->orderBy('created_at', 'desc')
            ->paginate();
    }
}
