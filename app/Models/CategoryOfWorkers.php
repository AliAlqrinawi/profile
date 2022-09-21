<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfWorkers extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar' , 'name_en'];


    public function has_works()
    {
        return $this->hasMany(Work::class , 'id_category' , 'id');
    }
}
