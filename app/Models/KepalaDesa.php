<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KepalaDesa extends Model
{
    protected $table = 'kepala_desa';
    protected $fillable = [
        'nama',
        'slug',
        'sambutan',
        'image',
    ];

    // Auto generate slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($kepalaDesa) {
            $kepalaDesa->slug = Str::slug($kepalaDesa->nama);
        });

        static::updating(function ($kepalaDesa) {
            $kepalaDesa->slug = Str::slug($kepalaDesa->nama);
        });
    }
}
