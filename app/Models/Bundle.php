<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Unit;

class Bundle extends Model
{
    /** @use HasFactory<\Database\Factories\BundleFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product', 'quantity', 'price', 'order_id', 'unit_id'];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
