<?php

namespace App\Models\backend;

use App\Models\User;
use App\Models\backend\ProjectImage;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, Sluggable;
    protected $table = "projects";
    protected $fillable = [
        'name',
        'slug',
        'body',
        'price',
        'demo_link',
        'tools',
        // 'thumbnail',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'project_users');
    // }

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_users', 'project_id', 'user_id');
    }
    public function project_images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function getRouteKeyName()
{
    return 'slug';
}


  
}
