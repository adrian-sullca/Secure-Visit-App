<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email'
    ];

    public function familyVisit()
    {
        return $this->hasOne(FamilyVisit::class);
    }

    public function professionalVisit()
    {
        return $this->hasOne(ProfessionalVisit::class);
    }
}