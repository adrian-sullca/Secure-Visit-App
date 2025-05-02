<?php

namespace App\Models;

use App\ActionType;
use Illuminate\Database\Eloquent\Model;

class EntryExit extends Model
{
    protected $fillable = [
        'user_id',
        'visit_id',
        'action',
        'date_entry',
        'date_exit'
    ];

    protected $casts = [
        'action' => ActionType::class,
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
