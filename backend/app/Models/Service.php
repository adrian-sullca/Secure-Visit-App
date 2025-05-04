<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'enabled'
    ];

    public function professionals()
    {
        return $this->hasMany(ProfessionalVisit::class);
    }
}
