<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::orderBy('name')->get();
        return view('foods.create')->with(compact('restaurants'));
    }

    public function store(FoodRequest $request)
    {
        return redirect()->intended('/');
    }

    public function show(Food $food)
    {        
        return view('foods.details')->with(compact('food'));
    }

    public function edit(Food $food)
    {
        $restaurants = Restaurant::orderBy('name')->get();
        return view('foods.edit')->with(compact('food', 'restaurants'));
    }


    public function up(FoodRequest $request, Food $food)
    {
        dd('asd');
        $food->update($request->except('_token'));

        return redirect()->route('foods.edit', $food);
    }
}
