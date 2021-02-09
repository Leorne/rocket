<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filter\Product\MultipleFilter;
use App\Http\Filter\Product\MultipleFilterDto;
use App\Http\Requests\Api\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product\Product;
use App\Models\Product\Property;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductController extends Controller
{
    protected const PER_PAGE = 40;

    public function index(IndexRequest $request, MultipleFilter $filter) : ResourceCollection
    {
//        $test = Property::first();

        $request->validated();

        $products = Product::filter($filter->setData(new MultipleFilterDto($request->properties)));

        return ProductResource::collection($products->paginate(self::PER_PAGE));
    }
}
