<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service'
    ];

    public function professionals()
    {
        return $this->hasMany(ProfessionalVisit::class);
    }
}
