<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = 'academic_years'; // Specify the table name

    protected $fillable = [
        'user_id',
        'academic_year',
        'closure_date',
        'status',
        // Add other fillable attributes here
    ];
}
