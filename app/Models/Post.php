<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'job_title',
        'company_id',
        'city',
        'status',
    ];

    protected static function booted()
    {
        static::creating(static function ($object) {
            $object->user_id = 1; // đây là hardcode để test
            // $object->user_id = auth()->id(); -> cách đúng để sử dụng
        });
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }
}
