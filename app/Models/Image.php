<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bundle;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['description', 'url'];

    public function bundles(){
        return $this->belongsToMany(Bundle::class);
    }
}
