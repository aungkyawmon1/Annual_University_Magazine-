<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Magazine;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', // Add 'user_id' to the fillable attributes
        'magazine_id', // Add 'magazine_id' to the fillable attributes
        'comment', // Add 'comment' to the fillable attributes
        // Other fillable attributes, if any
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function magazine()
{
    return $this->belongsTo(Magazine::class);
}


}
