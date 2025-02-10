<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\State;
use App\Models\Bundle;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['date_passed', 'date_retrieve', 'state_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bundle(){
        return $this->hasMany(Bundle::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
}
