<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'capacity',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(ConferenceRegistration::class);
    }

    public function registeredUsers()
    {
        return $this->belongsToMany(User::class, 'conference_registrations')
            ->withPivot('status')
            ->withTimestamps();
    }
}
