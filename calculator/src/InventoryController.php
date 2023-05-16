<?php

namespace LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
class InventoryController extends Controller
{
    public function index()
    {
        $inventory =  DB::table('inventories')->where('status','1')->orderby('id', 'desc')->paginate(10);
       return view('calculator::inventory/index',compact('inventory'));
    }


    public function create()
    {
        return view('calculator::inventory/create');
    }


    public function edit($id)
    {
        $inventory =  DB::table('inventories')->where('id',$id)->first();
        return view('calculator::inventory/edit',compact('inventory'));
    }


    public function update(Request $request, $id)
    { 
        $itemprice = $request->price;
        DB::table('inventories')->where('id', $id)->update([
            'name' => $request->name,
            'price'=>$itemprice,
            'tax' => $request->tax,
            'currency' => $request->currency,
            'stock' => $request->stock,
        ]);       
        return redirect()->route('inventory.index')->with('success', __('Inventory Updated successfully'));
    }


    public function destroy($id)
    {
       DB::table('inventories')->where('id', $id)->delete();
       return redirect('inventory/index');
    }


    public function store(Request $request)
    {  
            $itemprice = $request->price;
       DB::table('inventories')->insert([
        'name' => $request->name,
        'price'=>$itemprice,
        'tax' => $request->tax,
        'currency' => $request->currency,
        'stock' => $request->stock,
    ]);    
            return redirect()->route('inventory.index')->with('success', __('Inventory created successfully'));     
    }

    

}
