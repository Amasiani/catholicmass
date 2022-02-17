<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoration extends Model
{
    use HasFactory;

    protected $table = 'adorations';
    protected $fillable = ['name', 'address', 'program'];
}
