<?php

namespace Support\Services;

use Domain\Product\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function store($data){

        if( isset($data['categories'])) {
            $categoryIds = $data['categories'];
            unset($data['categories']);
        }

        if( isset($data['properties'])) {
            $properties = $data['properties'];
            $propertiesToAttach = [];
            foreach ($properties as $id => $property){
                $propertiesToAttach[$id] = ['value' => $property];
            }
            unset($data['properties']);
        }

        try{

            DB::beginTransaction();
        //    dd($propertiesToAttach);
            $product = Product::firstOrCreate($data);

            if( isset($categoryIds)) {
                $product->categories()->attach($categoryIds);
            }
            if( isset($propertiesToAttach)) {
                $product->properties()->attach($propertiesToAttach);
            }

            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $product;
    }

    public function update($data, $product){

        if( isset($data['categories'])) {
            $categoryIds = $data['categories'];
            unset($data['categories']);
        }

        if( isset($data['properties'])) {
            $properties = $data['properties'];
            $propertiesToAttach = [];
            foreach ($properties as $id => $property){
                $propertiesToAttach[$id] = ['value' => $property];
            }
            unset($data['properties']);
        }

        try{

            DB::beginTransaction();
            $product->update($data);

            if( isset($categoryIds)) {
                $product->categories()->sync($categoryIds);
            }

            if( isset($propertiesToAttach)) {
                $product->properties()->sync($propertiesToAttach);
            }

            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        }
        return $product;
    }

}
