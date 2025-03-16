<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Card;
use App\Models\Bundle;
use App\Models\Place;
use App\Models\Order;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    use HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cards(){
        return $this->belongsToMany(Card::class)->as('subscription')->withPivot('start', 'end');
    }

    public function onGoingSubscription(){
        $max = date('Y-m-d', mktime(0,0,0,date('m')+2,date('d'),date('Y')));
        return $this->cards()->wherePivotBetween('end', [date('Y-m-d'), $max]);
    }

    public function endedSubscription(){
        $max = date('Y-m-d', mktime(0,0,0,date('m')+2,date('d'),date('Y')));
        return $this->cards()->wherePivotNotBetween('end', [date('Y-m-d'), $max]);
    }

    public function places(){
        return $this->belongsToMany(Place::class)->as('reservation')->withPivot('end');
    }

    public function bundles(){
        return $this->belongsToMany(Bundle::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
