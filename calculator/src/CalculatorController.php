<?php

namespace LP\Calculator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Hash;
class CalculatorController extends Controller
{
 


    public function index()
    {
        $data = DB::table('users')->get();
       return view('calculator::index',compact('data'));
    }
    public function create()
    {
        
        // print_r($data);
        // exit;
        return view('calculator::create');
    }
    public function store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect('user');
    }
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('index');
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->first();
        return  view('calculator::edit', compact('user'));
    }
    public function update(Request $request, $id)
    { 
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        return redirect('index'); 
    }
}
  // $user = DB::table('users')->where('id',$id)->first();
        // DB::table('users')->where('id',$id)->update([
        //     'name' => $request->name,
        //     'email'=>$request->email,
        //     'password'=> Hash::make($request->password)
        // ]);