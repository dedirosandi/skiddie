<?php

namespace App\Models\backend;

use App\Models\backend\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImage extends Model
{
    use HasFactory;
    protected $table = "project_images";
    protected $fillable = [
        'project_id',
        'image',
    ];

     public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
