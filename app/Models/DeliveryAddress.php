<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;


class DeliveryAddress extends Model
{
    protected $fillable = ["fname"];
    use HasFactory;

    public function area(){
     return $this->hasOne(Area::class,"id","areas_id");
    }
}
