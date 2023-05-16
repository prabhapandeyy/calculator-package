<?php

namespace LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoice =  DB::table('invoices')->where('mark_deleted', '0')->orderby('id', 'desc')->paginate(10);
       return view('calculator::invoice/index',compact('invoice'));
    }
    public function create()
    {
        $invoicecategory = DB::table('invoice_categories')->get();
        // dd($invoicecategory);
        $templates ='';
        $customer='';
        $paymentmethod=DB::table('payment_methods')->get();
        $items ='';
       return view('calculator::invoice/create',compact('invoicecategory','templates','customer','paymentmethod','items'));
    }
    public function store(Request $request)
    {
       
    }
}
