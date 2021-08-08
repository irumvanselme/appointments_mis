<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentType extends Model
{
    use HasFactory;

    protected $casts = [];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
