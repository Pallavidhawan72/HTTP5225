<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // One-to-one relationship with course
    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
