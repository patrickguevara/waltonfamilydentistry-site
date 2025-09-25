<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'credentials',
        'headshot_url',
        'bio_markdown',
        'specialties',
        'social',
    ];

    protected $casts = [
        'specialties' => 'array',
        'social' => 'array',
    ];

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }
}
