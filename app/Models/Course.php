<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function pdfs () {
        return $this->hasMany(CoursePdf::class, "course_id", "id");
    }
    // public function batches () {
    //     return $this->hasMany(CourseBatch::class, "course_id", "id");
    // }
    public function courses () {
        return $this->hasMany(CourseBatch::class, "course_id", "id");
        
    }
}
