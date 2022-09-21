<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['title_en' , 'title_ar' , 'id_category'];
    static $messges  = [
        'title_ar.required' => 'قم بتعبئة الأسم بشكل صحيح',
        'title_en.required' => 'قم بتعبئة الأسم بشكل صحيح',
    ];
    public function has_categores()
    {
        return $this->belongsTo(CategoryOfWorkers::class , 'id_category' , 'id');
    }
}
