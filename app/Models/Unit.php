<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bundle;

class Unit extends Model
{
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
    protected $fillable = ['name'];

    public function bundle(){
        return $this->hasMany(Bundle::class);
    }
}
