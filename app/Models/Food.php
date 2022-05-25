<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Restaurant;
use App\Models\Category;

class Food extends Model
{
    use HasFactory;

    public function restaurant(){
        return $this->hasOne(Restaurant::class,"id","restaurant_id");
    }

    public function category(){
        return $this->hasOne(Category::class,"id","category_id");
    }

}
