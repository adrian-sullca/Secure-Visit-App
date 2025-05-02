<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalVisit extends Model
{
    protected $fillable = [
        'visit_id',
        'NIF',
        'age',
        'task'
    ];

    public function visit() {
        return $this->belongsTo(Visit::class);
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
