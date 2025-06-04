<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalVisit extends Model
{
    protected $fillable = [
        'visit_id',
        'company_id',
        'NIF',
        'age',
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function services()
    {
        return $this->hasMany(ProfessionalService::class, 'professional_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
