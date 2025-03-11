<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Building;
use App\Models\Condition;

class Equipment extends Model
{
    /** @use HasFactory<\Database\Factories\EquipmentFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'last_revision', 'next_revision', 'building_id', 'condition_id'];

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function condition(){
        return $this->belongsTo(Condition::class);
    }
}
