<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = ProductCategory::all();
        return view('product.product_category.index', compact('categories'));
    }

    public function add()
    {
        return view('product.product_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
            ],
            [
            'name.required'=> 'Enter Product Name First'
            ]
        );
        $category = new ProductCategory;
        $category->name = $request->name;
        $category->save();
        
        return redirect()->route('product_category')
            ->with('success', 'New Category added successfully.');

    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('product.product_category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $category = ProductCategory::find($request->id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('product_category')
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        ProductCategory::where('id',$id)->delete();

        return redirect()->route('product_category')
            ->with('success', 'Category deleted successfully');
    }
}
