<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\ProductCategory;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productTypes = ProductType::all();
        return view('product.product_type.index', compact('productTypes'));
    }

    public function add()
    {
        $category = ProductCategory::all();
        return view('product.product_type.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required'
        ],
        [
            'category_id.integer'=> 'Select Product Category',
            'name.required' => ' Enter Product Type Name'
        ]
        );
        $type = new ProductType;
        $type->product_category_id = $request->category_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();
        
        return redirect()->route('product_type')
            ->with('success', 'New Type added successfully.');

    }

    public function edit($id)
    {
        $type = ProductType::find($id);
        $category = ProductCategory::all();
        return view('product.product_type.edit', compact('category','type'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'product_category_id'=>'required'
        ]);
        $type = ProductType::find($request->id);
        $type->product_category_id = $request->product_category_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->save();

        return redirect()->route('product_type')
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        ProductType::where('id',$id)->delete();

        return redirect()->route('product_type')
            ->with('success', 'Type deleted successfully');
    }
}
