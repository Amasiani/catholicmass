<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $table = 'societies';
    
    protected $fillable = ['name', 'program'];

    public function church()
    {
        return $this->belongsTo(Church::class, 'church_id', 'id');
    }
}
