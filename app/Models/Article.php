<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
     public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'Commentable')->whereNull('parent_id');
    }
}


