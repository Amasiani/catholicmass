<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $table = 'churches';

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'program',
        'website',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'church_id', 'id');
    }

    public function societies()
    {
        return $this->hasMany(Society::class, 'church_id', 'id');
    }

}
