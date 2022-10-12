<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'schoolorigin', 'birthplace', 'birthdate', 'photo', 'address', 'city', 'province', 'postalcode'
    ];
    
    public function assesments()
    {
        return $this->hasMany(Assesment::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
