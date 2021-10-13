<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ownerName',
    ];

    public function foods(){
        return $this->hasMany(Food::class);
    }
}
