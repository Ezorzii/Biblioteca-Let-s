<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'author', 'user_id'
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}