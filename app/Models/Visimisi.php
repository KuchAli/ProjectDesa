<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    protected $table = 'visi_misi';
    protected $fillable = ['visi', 'misi'];
}