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
}
