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
    
    public function assesment()
    {
        return $this->hasOne(Assesment::class);
    }
}
