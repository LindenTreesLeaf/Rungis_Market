<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sector;
use App\Models\Type;
use App\Models\Place;
use App\Models\Equipment;

class Building extends Model
{
    /** @use HasFactory<\Database\Factories\BuildingFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'sector_id', 'type_id','latitude','longitude'];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function sector(){
        return $this->belongsTo(Sector::class);
    }

    public function places(){
        return $this->hasMany(Place::class);
    }

    public function freePlaces(){
        return $this->places()->whereDoesntHave('users')->count();
    }

    public function equipments(){
        return $this->hasMany(Equipment::class);
    }
}
