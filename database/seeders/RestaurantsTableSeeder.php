<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant = Restaurant::create(['name' => 'Master Sushi', 'ownerName' => 'Wang mester']);
        $restaurant = Restaurant::create(['name' => 'BambaMarha', 'ownerName' => 'Nagy László']);        
        $restaurant = Restaurant::create(['name' => 'Nordsee', 'ownerName' => 'Kristoffer Olsson']);
    }
}
