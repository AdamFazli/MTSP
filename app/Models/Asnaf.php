<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asnaf extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'ic',
        'gender',
        'dob',
        'phone',
        'email',
        'address',
        'photo',
        'household_size',
        'income',
        'expenses',
        'job_status',
        'assets',
        'debts',
        'category',
        'status',
        'documents',
        'notes',
        'officer',
        'remarks',
        'follow_up',
    ];
}
