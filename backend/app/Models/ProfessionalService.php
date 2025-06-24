<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalService extends Model
{
    protected $fillable = [
        'entry_exit_id',
        'professional_id',
        'service_id',
        'task',
    ];

    public function professional()
    {
        return $this->belongsTo(ProfessionalVisit::class, 'professional_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function entry()
    {
        return $this->belongsTo(EntryExit::class, 'entry_exit_id');
    }
}
