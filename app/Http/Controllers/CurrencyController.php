<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{

    public function index()
    {
        $currencies = Currency::latest()->get();
        return view('index' , compact('currencies'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:currencies',
            'code' => 'required',
            'decimal_numbers' => 'required',
            'is_primary' => 'required|boolean'
        ]);
        $currency = Currency::create($request->all());
//        session()->flash('success' , 'Currency created Successfuly');

        return response()->json($currency);
    }

    public function show(Currency $currency)
    {
        //
    }


    public function edit(Currency $currency)
    {
        return view('edit',compact('currency'));
    }


    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'decimal_numbers' => 'required',
            'is_primary' => 'required|boolean'
        ]);
        $currency->update($request->all());
        session()->flash('success' , 'Currency Updated Successfuly');

        return redirect()->route('currencies.index');
    }


    public function destroy(Currency $currency)
    {
         $currency->delete();
        session()->flash('success' , 'Currency deleted Successfuly');

        return redirect()->route('currencies.index');
    }
}
