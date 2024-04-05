<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Magazine extends Model
{
    protected $table = 'magazine';
    protected $primaryKey = 'magazine_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'department_id',
        'academic_year_id',
        'title',
        'description',
        'file_url',
        'image_url',
        'view_count',
        'is_published',
        'status',
    ];


public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

// public function comments()
//     {
//         return $this->hasMany(Comment::class, 'magazine_id');
//     }

public function comments()
    {
        return $this->hasMany(Comment::class, 'magazine_id', 'magazine_id');
    }
}




