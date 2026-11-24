<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['title', 'description', 'type', 'price', 'image'];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Application::class);
    }
}
