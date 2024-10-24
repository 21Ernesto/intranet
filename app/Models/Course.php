<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'user_id',
        'level_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function courseMaterials()
    {
        return $this->hasMany(CourseMaterial::class);
    }
}
