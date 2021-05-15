<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Vendor;
use App\Models\Stock;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $purchases = Purchase::orderBy('id', 'DESC')->get();
        $vendors = Vendor::all();
        return view('product.purchase.index', compact('purchases','vendors'));
    }

    public function add()
    {
        $products = Product::all();
        $vendors = Vendor::all();
        return view('product.purchase.create', compact('products','vendors'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_code'=>'required',
            'quantity'=>'required|integer',
            'unit_price'=>'required|integer',
            'vendor_id'=>'required|integer',
            'date'=>'required'
        ],
        [
            'product_code.required'=> 'Select Your Registered Product First',
            'quantity.integer'=> 'Enter Product Quantity',
            'unit_price.integer'=> 'Enter Price',
            'vendor_id.integer'=> 'Select Vendor ID', 
            'date.required'=> 'Product Purchase Date is Required' 
            ]
        );
        
        
        $purchase = new Purchase();
        $purchase->product_code = $request->product_code;
        $purchase->quantity = $request->quantity;
        $purchase->unit_price = $request->unit_price;
        $purchase->vendor_id = $request->vendor_id;
        // convert date format
        $myDate = $request->date;
        $newDate = Carbon::createFromFormat('d/m/Y', $myDate)->format('Y-m-d');
        $purchase->date = $newDate;

        $purchase->save();

        // update stock table also
        $stock = new Stock();
        $stock->product_code = $request->product_code;
        $stock->quantity = $request->quantity;
        $stock->date = $newDate;
        $stock->purchase_id = $purchase->id;
        $stock->save();
        
        // total stock item of a product
        $productStock = Stock::where('product_code', '=', $request->product_code)->where('product_code','=',$request->product_code)->sum('quantity');

        //update product stock, date on product table
        $product = Product::where('code', '=', $request->product_code)->first();
        $product->stock = $productStock;
        $product->purchase_date = $purchase->date;
        $product->save();

        return redirect()->route('purchase')
            ->with('success', 'Purchase-data added successfully.');

    }

    public function edit($id)
    {
        $purchase = Purchase::find($id);
        $products = Product::all();
        $vendors = Vendor::all();
        return view('product.purchase.edit', compact('purchase','products','vendors'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_code'=>'required',
            'quantity'=>'required|integer',
            'unit_price'=>'required|integer',
            'vendor_id'=>'required|integer',
            'date'=>'required'
        ],
        [
            'product_code.required'=> 'Select Your Registered Product First',
            'quantity.integer'=> 'Enter Product Quantity',
            'unit_price.integer'=> 'Enter Price',
            'vendor_id.integer'=> 'Select Vendor ID', 
            'date.required'=> 'Product Purchase Date is Required' 
            ]
        );
        
        $purchase = Purchase::find($request->id);
        $purchase->product_code = $request->product_code;
        $purchase->quantity = $request->quantity;
        $purchase->unit_price = $request->unit_price;
        $purchase->vendor_id = $request->vendor_id;
        $purchase->date = $request->date;
        $purchase->save();

        // update stock table also
        $stock = Stock::where('purchase_id', '=', $purchase->id)->firstOrFail();
        $stock->product_code = $request->product_code;
        $stock->quantity = $request->quantity;
        $stock->date = $request->date;
        $stock->purchase_id = $purchase->id;
        $stock->save();

        // total stock item of a product
        $productStock = Stock::where('product_code', '=', $request->product_code)->where('product_code','=',$request->product_code)->sum('quantity');

        //update product stock, date on product table
        $product = Product::where('code', '=', $request->product_code)->first();
        $product->stock = $productStock;
        $product->purchase_date = $purchase->date;
        $product->save();

        return redirect()->route('purchase')
            ->with('success', 'Purchase-data Updated successfully.');
    }

    public function destroy($id)
    {
        Purchase::where('id',$id)->delete();

        return redirect()->route('purchase')
            ->with('success', 'Purchase-data deleted successfully');
    }
}
