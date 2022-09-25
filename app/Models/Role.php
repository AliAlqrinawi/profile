<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";

    protected $fillable  = ['name' , 'permissions'];

    protected $casts = [
        'permissions' => 'array'
    ];

    public function users(){
        return $this->belongsToMany(User::class , 'role_user');
    }
}