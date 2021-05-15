<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $vendors = Vendor::all();
        return view('product.vendor.index', compact('vendors'));
    }

    public function add()
    {
        return view('product.vendor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
                'name'=>'required'
            ],
            [
                'name.required'=> 'Enter Name First'
            ]
        );
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->contact_info = $request->contact;
        $vendor->address = $request->address;
        $vendor->status = 1;
        $vendor->save();
        
        return redirect()->route('vendor')
            ->with('success', 'Vendor added successfully.');

    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('product.vendor.edit', compact('vendor'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $vendor = Vendor::find($request->id);
        $vendor->name = $request->name;
        $vendor->contact_info = $request->contact;
        $vendor->address = $request->address;
        $vendor->status = 1;
        $vendor->save();

        return redirect()->route('vendor')
            ->with('success', 'vendor updated successfully');
    }

    public function destroy($id)
    {
        Vendor::where('id',$id)->delete();
        return redirect()->route('vendor')
            ->with('success', 'Vendor deleted successfully');
    }
}
