<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempahDewan extends Model
{
    use HasFactory;

    protected $table = 'tempah_dewan';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'date',
        'dewan_type',
        'description',
        'user_id',
        'status',
    ];
}
