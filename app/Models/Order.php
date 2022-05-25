<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryAddress;
use App\Models\OrderDetails;
use App\Models\User;


class Order extends Model
{
    use HasFactory;

    // public function deliveryAddress(){
    //     return $this->hasOne(DeliveryAddress::class, 'id', 'delivery_addresses_id'); 
    // }

    public function details(){
        return $this->hasMany(OrderDetails::class);
    }
     public function address(){
        return $this->hasOne(DeliveryAddress::class,"id","delivery_addresses_id");
    }

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
