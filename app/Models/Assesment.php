<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'criteria_id',
        'parameter_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}
