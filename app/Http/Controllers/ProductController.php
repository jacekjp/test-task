<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);
        return response()->json($products);
    }

    public function get($id)
    {
        $product = Product::find($id);
        if($product)
            return response()->json($product);
        else
        return response()->json(["message" => "product not found"]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if($product)
           return response()->json($product->delete());
        else
           return response()->json(["message" => "product not found"]);

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'description' => 'required|max:30',
            'data1' => 'required|max:30',
            'data2' => 'required|max:30',
            'data3' => 'required|max:30',
        ]);


        if ($validator->fails()) {

            $errors = $validator->errors();
            return response()->json(["message" => $errors]);
        }

        if ($validator->passes()) {
            try {
                $product = new Product;

                $product->name = $request->name;
                $product->description = $request->description;
                $product->data1 = $request->data1;
                $product->data2 = $request->data2;
                $product->data3 = $request->data3;

                $product->save();

                $url = route('product', ['id' => $product->id]);

                return response()->json(['url' => $url]);
            }
            catch(\Exception $e){
                return response()->json(["message" => $e->getMessage()]);
             }

        }

    }

}
