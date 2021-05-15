<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sell;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$sells = Sell::paginate(5);
        $sells = DB::table('products')
        ->join('sells', 'products.code', '=', 'sells.product_code')
        ->get();
        // dd($sells);
        return view('product.sell.index', compact('sells'));
    }

    public function add()
    {
        $products = Product::all();
        $sells = Sell::all();
        return view('product.sell.create', compact('products','sells'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'product_code'=>'required',
            'quantity'=>'required',
            'unit_price'=>'required',
            'customer_id'=>'required',
            'date'=>'required'
            ],
            [
            'product_code'=> 'Select Product First',
            'quantity.required'=> 'Product Quantity Required',
            'unit_price.required'=> 'Enter Product price',
            'customer_id.required'=> 'Enter Customer ID',
            'date.required'=> 'Date required',
            ]
        );

        // convert date format
        $myDate = $request->date;
        $date = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d');

        // product selling
        $sells = new Sell();
        $sells->product_code = $request->product_code;
        $sells->quantity = $request->quantity;
        $sells->unit_price = $request->unit_price;
        $sells->customer_id = $request->customer_id;
        $sells->date = $date;
        $sells->save();

        // update stock table also
        $stock = new Stock();
        $stock->product_code = $request->product_code;
        $stock->quantity = -($request->quantity);
        $stock->date = $date;
        $stock->purchase_id = false;
        $stock->save();
        
        // total stock item of a product
        $productStock = Stock::where('product_code', $request->product_code)->where('product_code','=',$request->product_code)->sum('quantity');
        
        //update product stock on product table
        $product = Product::where('code', $request->product_code)->first();
        $product->stock = $productStock;
        $product->save();

        return redirect()->route('sell')
            ->with('success', 'Sold successfully.');

    }

    public function edit($id)
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
