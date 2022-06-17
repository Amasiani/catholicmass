<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = [
        'title',
        'description',
        'church_id',
    ];

    public function church() 
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }
}
