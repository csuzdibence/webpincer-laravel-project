<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::orderBy('name')->simplePaginate(6);
        return view('home')->with(compact('restaurants'));
    }
}
