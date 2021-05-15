<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('product.products.index', compact('products'));
    }

    public function add()
    {
        $category = ProductCategory::all();
        $type = ProductType::all();
        return view('product.products.create', compact('category','type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'enname'=>'required',
            'code'=>'required'
        ],
        [
            'enname.required'=> 'Enter Product English Name First',
            'code.required'=> 'Product Code must be valid'
        ]
        );


        $product = new Product();
        $product->name_english = $request->enname;
        $product->name_bangla = $request->bnname;
        $product->code = $request->code;
        $product->brand = $request->brand;
        $product->measurement = $request->measurement;
        $product->category = $request->category_id;
        $product->type = $request->type_id;
        $product->purchase_date = $request->purchase_date;
        $product->sell_price = $request->sell_price;

        // if request has file
        if($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->image->move(public_path('img'), $fileNameToStore);  
        }else{
           // if no file from request , then set default no-image.jpeg to database
           $fileNameToStore='no-image.jpeg';
        }
        $product->image=$fileNameToStore;
        $product->description = $request->description;
        $product->save();
        
        return redirect()->route('product')
            ->with('success', 'Product added successfully.');

    }

    public function show($code)
    {
        $product = Product::where('code', '=', $code)->firstOrFail();
        $category = ProductCategory::find($product->category);
        $type = ProductType::find($product->type);
        return view('product.products.view', compact('product','category','type'));
    }

    public function edit($code)
    {
        $product = Product::where('code', '=', $code)->firstOrFail();
        $category = ProductCategory::all();
        $type = ProductType::all();
        return view('product.products.edit', compact('product','category','type'));
    }

    public function update(Request $request)
    {
        
        $request->validate([
            'enname'=>'required',
            'category_id'=>'required'
        ]);
        
        $product = Product::where('code', '=', ($request->code))->firstOrFail();
        $product->name_english = $request->enname;
        $product->name_bangla = $request->bnname;
        $product->brand = $request->brand;
        $product->measurement = $request->measurement;
        $product->category = $request->category_id;
        $product->type = $request->type_id;
        $product->sell_price = $request->sell_price;

        // if request has file
        if($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->image->move(public_path('img'), $fileNameToStore);  
            $product->image = $fileNameToStore;
        }
        
        $product->description = $request->description;
        $product->update();
        
        return redirect()->route('product')
            ->with('success', 'Product updated successfully.');

    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return redirect()->route('product')
            ->with('success', 'Product deleted successfully');
    }
}
