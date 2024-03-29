<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Magazine;
class Comment extends Model
{
    use HasFactory;
    public function user()
{
    return $this->belongsTo(User::class);
}

public function magazine()
{
    return $this->belongsTo(Magazine::class); 
}


}
