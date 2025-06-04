<?php

namespace App\Models;

use App\VisitType;
use Illuminate\Database\Eloquent\Model;

class EntryExit extends Model
{
    protected $fillable = [
        'user_id',
        'visit_id',
        'visit_type',
        'date_entry',
        'date_exit'
    ];

    protected $casts = [
        'visit_type' => VisitType::class,
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function professionalService()
    {
        return $this->hasOne(ProfessionalService::class, 'entry_exit_id');
    }
}
