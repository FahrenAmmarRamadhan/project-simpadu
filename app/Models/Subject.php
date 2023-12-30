<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'title',
        'semester',
        'academic_year',
        'sks',
        'description',
    ];

    public function lecturer()
    {
        return $this->belongsTo(User::class);
    }
}
