<?php

namespace LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
class InvoiceCategoryController extends Controller
{
    public function index()
    {
        $invoiceCategory =  DB::table('invoice_categories')->orderby('id', 'desc')->paginate(10);
         
       return view('calculator::invoice_category/index',compact('invoiceCategory'));
    }
    public function create()
    {
        return view('calculator::invoice_category/create');
    }
    public function store(Request $request)
    {  
            
       DB::table('invoice_categories')->insert([
        'title' => $request->title,
        'series' => $request->series,
    ]);    
            return redirect()->route('invoiceCategory.index')->with('success', __('Invoice Category created successfully'));     
    }
    public function edit($id)
    {
        $invoiceCategory =  DB::table('invoice_categories')->where('id',$id)->first();
        return view('calculator::invoice_category/edit',compact('invoiceCategory'));
    }
    public function update(Request $request, $id)
    { 
    //    dd($request);
        DB::table('invoice_categories')->where('id', $id)->update([
            'title' => $request->title,
            'series' => $request->series,
        ]);       
        return redirect()->route('invoiceCategory.index')->with('success', __('Invoice Category Updated successfully'));  
    }
    public function destroy($id)
    {
       DB::table('invoice_categories')->where('id', $id)->delete();
       return redirect('invoiceCategory/index');
    }
}