<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'CIF',
        'name',
        'telephone',
        'enabled'
    ];

    public function professionals()
    {
        return $this->hasMany(ProfessionalVisit::class);
    }
}
