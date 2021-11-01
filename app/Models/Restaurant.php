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

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->orderBy('created_at', 'desc');
    }

    public function getHasImageAttribute() {
        return $this->image !== null;
    }

    public function getCoverImageAttribute() {
        if ($this->has_image) {
            return "/uploads/{$this->image}";
        }
        return 'https://via.placeholder.com/1500';
    }
}
