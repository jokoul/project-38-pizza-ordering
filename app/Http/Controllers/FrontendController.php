<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->category);
        if(!$request->category){
            $pizzas = Pizza::latest()->get();
            return view('frontpage', compact('pizzas'));
        }
        $pizzas = Pizza::where('category',$request->category)->get();
        return view('frontpage', compact('pizzas'));
    }

    public function show($id)
    {
        $pizza = Pizza::find($id);
        return view('show',compact('pizza'));
    }

    public function store(Request $request)
    {
        if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0){
            return back()->with('errmessage','Please order at least one pizza');
        }
        if($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0){
            return back()->with('errmessage','Order should not have negative number');
        }
        // dd($request->all());
        Order::create([
            'time' => $request->time,
            'date' => $request->date,
            'user_id' => auth()->user()->id,//we access to authenticated user information in table
            'pizza_id' => $request->pizza_id,
            'small_pizza' => $request->small_pizza,
            'medium_pizza' => $request->medium_pizza,
            'large_pizza' => $request->large_pizza,
            'body' => $request->body,
            'phone' => $request->phone
        ]);
        return back()->with('message','Your Order is successfull.');
    }
}
