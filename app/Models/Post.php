<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    //referencia al modelo de user, un post pertenece solo a un user
    public function user()
    {
        // return $this->belongsTo(User::class)->select(['name','username']);
        return $this->belongsTo(User::class);
    }
}
