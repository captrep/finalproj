<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;
    protected $fillable = [
        'criteria_id',
        'weighted',
    ];
    
    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
