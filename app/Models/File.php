<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'link',
        'type',
    ];
    public $timestamps = false;

    protected static function booted()
    {
        static::creating(static function ($object) {
            $object->user_id = 1; // đây là hardcode để test
            // $object->user_id = auth()->id(); -> cách đúng để sử dụng
        });
    }

}
