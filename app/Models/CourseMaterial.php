<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'file_path',
        'uploaded_at',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
