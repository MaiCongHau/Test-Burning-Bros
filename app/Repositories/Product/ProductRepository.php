<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Product::class;
    }

    public function getProduct($request)
    {
        $model = $this->model;
        // sort by price
        if (isset($request->sort) && $request->sort != '') {
            $model = $model->orderBy('price', $request->sort);
        }
        // filter by price
        if (isset($request->price) && $request->price != '') {
            $temp = explode("-", $request->price);
            $start = $temp[0];
            $end = $temp[1];
            $model = $model->whereBetween('price', [$start, $end]);
        }
        // filter by location
        if (isset($request->location) && $request->location != '') {
            $model =  $model->whereHas('location', function ($query) use ($request) {
                $query->where('slug', $request->location);
            });
        }

        return  $model->paginate(2);
    }
}
