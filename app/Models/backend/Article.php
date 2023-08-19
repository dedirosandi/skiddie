<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory,Sluggable;
    protected $fillable = ['title', 'slug', 'category', 'body', 'thumbnail','user_id'];

     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

 

public function user()
    {
        return $this->belongsTo(User::class);
    }
public function getRouteKeyName()
{
    return 'slug';
}
}
