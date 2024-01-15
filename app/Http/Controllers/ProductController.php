<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    //




    function viewData(Request $request)
    {
        $data = ProductModel::with(['Category'])->where('product_name','LIKE', "%$request->search%")->orWhere('product_code','LIKE',"%$request->search%")->simplePaginate(2);

        $data = $data->appends(['search'=>$request->search]);

        return view('product.view', compact('data'));
    }

    function viewAdd(Request $request)
    {
        $category = CategoryModel::all();
        return view('product.add', compact('category'));
    }

    function submitAdd(ProductRequest $request)
    {
        $insert = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status
        ];

        ProductModel::create($insert);

        return redirect("/product/add");
    }

    function viewEdit($id, Request $request)
    {
        $data = ProductModel::find($id);
        $category = CategoryModel::all();

        return view('product.edit', compact('data', 'category'));
    }

    function submitEdit(Request $request)
    {
        $update = [
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'status' => $request->status
        ];

        ProductModel::where('id', $request->id)->update($update);

        return redirect("/product/edit/".$request->id);
    }

    function delete($id, Request $request)
    {
        ProductModel::where('id', $id)->delete();

        return redirect("/product");
    }

    function getRow()
    {
        $product = ProductModel::all();
        return view('product.row', compact('product'));
    }
}
