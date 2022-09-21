<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title_ar' , 'title_en' , 'description_ar' , 'description_en' , 'icon'];

    protected $casts = [
        'icon' => 'json'
    ];
}
