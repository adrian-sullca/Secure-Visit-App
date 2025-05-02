<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyVisit extends Model
{
    protected $fillable = [
        'visit_id',
        'student_name',
        'student_surname',
        'student_course',
        'motive_id'
    ];

    public function visit() {
        return $this->belongsTo(Visit::class);
    }
    

    public function motive()
    {
        return $this->belongsTo(Motive::class);
    }
}
