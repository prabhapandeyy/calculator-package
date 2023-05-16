<?php

namespace LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethod =  DB::table('payment_methods')->orderby('id', 'desc')->paginate(10);
       return view('calculator::payment_method/index',compact('paymentMethod'));
    }

    
    public function create()
    {
        return view('calculator::payment_method/create');
    }


    public function store(Request $request)
    {  
       DB::table('payment_methods')->insert([
        'paymentmethod' => $request->paymentmethod,   
        'paymentdetails' => $request->paymentdetails,
    ]);    
            return redirect()->route('paymentMethod.index')->with('success', __('Payment Method created successfully'));     
    }


    public function edit($id)
    {
        $paymentMethod =  DB::table('payment_methods')->where('id',$id)->first();
        return view('calculator::payment_method/edit',compact('paymentMethod'));
    } 


    public function update(Request $request, $id)
    { 
        DB::table('payment_methods')->where('id', $id)->update([
            'paymentmethod' => $request->paymentmethod,   
            'paymentdetails' => $request->paymentdetails,
        ]);       
        return redirect()->route('paymentMethod.index')->with('success', __('Payment Method Updated successfully'));
    }


    public function destroy($id)
    {
       DB::table('payment_methods')->where('id', $id)->delete();
       return redirect('paymentMethod/index');
    }
}
