<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    protected $fillable = [
        'criteria_id',
        'fuzzy',
        'description'
    ];
    
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
