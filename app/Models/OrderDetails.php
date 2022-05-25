<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;


class OrderDetails extends Model
{
    use HasFactory;

    public function food(){
        return $this->hasOne(Food::class,"id","food_id");
    }
}
