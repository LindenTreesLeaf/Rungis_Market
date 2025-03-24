<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Unit;
use App\Models\Sector;
use App\Models\Image;

class Bundle extends Model
{
    /** @use HasFactory<\Database\Factories\BundleFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product', 'quantity', 'price', 'validated', 'user_id', 'unit_id', 'sector_id', 'image_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function isReserved(){
        foreach($this->orders as $order){
            if($order->state_id == 2)
                return True;
        }
        return False;
    }

    public function isSold(){
        foreach($this->orders as $order){
            if($order->state_id == 3)
                return True;
        }
        return False;
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    public function images(){
        return $this->belongsToMany(Image::class);
    }
}
