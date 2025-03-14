<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Building;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'building_id'];

    public function users(){
        return $this->belongsToMany(User::class)->as('reservation')->withPivot('end');
    }

    public function reserved(){
        foreach($this->users as $user){
            if($user->reservation->end > date('Y-m-d')){
                return True;
            }
        }
        return False;
    }

    public function building(){
        return $this->belongsTo(Building::class);
    }
}
