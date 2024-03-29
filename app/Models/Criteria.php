<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'weighted',
    ];

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }

    public function assesments()
    {
        return $this->hasMany(Assesment::class);
    }
}
