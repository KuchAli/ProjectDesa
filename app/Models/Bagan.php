<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagan extends Model
{
    protected $table = 'bagan';
    protected $fillable = ['bagan_slug', 'image_bagan'];
}