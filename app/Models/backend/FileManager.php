<?php

namespace App\Models\backend;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileManager extends Model
{
    use HasFactory;
    protected $table = 'file_managers';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'file_description',
        'uploaded_by',
    ];

    public function uploadedByUser()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }


   public function shortenLink()
{
    $accessToken = 'e3814c354555facd98ea853d5264fa6eb4ebaff6';
    $publicUrl = url(Storage::url($this->file_path));

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
    ])->post('https://api-ssl.bitly.com/v4/shorten', [
        'long_url' => $publicUrl,
    ]);

    if ($response->ok()) {
        $data = $response->json();
        return $data['id'];
    }

    return $publicUrl;
}

}
