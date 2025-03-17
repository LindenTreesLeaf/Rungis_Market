<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Building;
use App\Models\Bundle;

class Sector extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    public function buildings(){
        return $this->hasMany(Building::class);
    }

    public function bundles(){
        return $this->hasMany(Bundle::class);
    }
}
