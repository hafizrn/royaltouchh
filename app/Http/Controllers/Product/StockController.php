<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Purchase;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stocks = Stock::all();
        return view('product.stock.index', compact('stocks'));
    }

    public function add()
    {
        $products = Product::all();
        $purchases = Purchase::all();
        return view('product.stock.create', compact('products','purchases'));
    }

    public function store(Request $request)
    {
        $request->validate([
                'product_id'=>'required|integer'
            ],
            [
                'product_id.integer'=> 'Select Product First'
            ]
        );
        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->quantity = $request->quantity;
        $stock->date = $request->date;
        $stock->purchase_id = $request->purchase_id;
        $stock->save();
        
        return redirect()->route('stock')
            ->with('success', 'Stored in Stock successfully.');

    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        $products = Product::all();
        $purchases = Purchase::all();
        return view('product.stock.edit', compact('products','purchases','stock'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'enname'=>'required'
        ]);
        $product = Product::find($request->id);
        $product->name_english = $request->enname;
        $product->name_bangla = $request->bnname;
        $product->code = $request->code;
        $product->width = $request->width;
        $product->length = $request->length;
        $product->height = $request->height;
        $product->weight = $request->weight;
        $product->category = $request->category_id;
        $product->type = $request->type_id;
        $product->stock = $request->stock;
        $product->purchase_date = $request->purchase_date;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->shipping_cost = $request->shipping_cost;
        $product->discount = $request->discount;
        $product->image = $request->image;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('product')
            ->with('success', 'Stock updated successfully');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return redirect()->route('product')
            ->with('success', 'Stock-data deleted successfully');
    }
}
