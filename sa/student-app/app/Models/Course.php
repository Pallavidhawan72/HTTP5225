<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'professor_id',
    ];

    // Many-to-many relationship with students
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    // One-to-one relationship with professor
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
