<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'academic_year',
        'closure_date'
    ];
}
