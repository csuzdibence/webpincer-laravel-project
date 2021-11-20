<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantRequest;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class RestaurantController extends Controller
{    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $restaurant = Restaurant::create($request->all());

        return redirect()->route('restaurants.details', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $foods = Food::where('restaurant_id', $restaurant->id)->get();
        return view('restaurants.details')->with(compact('restaurant', 'foods'));
    }

    public function comment(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->message = $request->comment;
        
        $restaurant->comments()->save($comment);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit')->with(compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \RestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->except('_token'));

        return redirect()->route('restaurant.edit', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();  

        return redirect()->route('home');
    }

    public function uploadImage(Request $request, Restaurant $restaurant)
    {
        dd($request);
        if (!$request->ajax()) {
            return abort(404);
        }

        $image = $request->file('image');
        $fileID = uniqid();
        $filename = "restaurant/{$fileID}.{$image->extension()}";
        dd($filename);
        Image::make($image)->save(public_path("/uploads/{$filename}"));

        $restaurant->image = $filename;
        $restaurant->save();

        return response()->json(['image' => $restaurant->image ]);
    }
}
