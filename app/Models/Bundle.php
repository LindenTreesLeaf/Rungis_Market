<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Unit;
use App\Models\Sector;

class Bundle extends Model
{
    /** @use HasFactory<\Database\Factories\BundleFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product', 'quantity', 'price', 'user_id', 'unit_id', 'sector_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsToMany(Order::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }

    public function sector(){
        return $this->belongsTo(Sector::class);
    }
}
