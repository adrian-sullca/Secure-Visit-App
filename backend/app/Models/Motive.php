<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motive extends Model
{
    protected $fillable = [
        'motive',
        'description'
    ];

    public function familyVisits()
    {
        return $this->hasMany(FamilyVisit::class);
    }
}
