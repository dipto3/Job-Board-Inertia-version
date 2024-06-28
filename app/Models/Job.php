<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'category_id',
        'title',
        'uuid',
        'tags',
        'location',
        'published',
        'deadline',
        'salary',
        'employment_type',
        'experience',
        'gender',
        'link',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function jobView()
    {
        return $this->hasMany(JobView::class);
    }

    public function jobApply()
    {
        return $this->hasMany(JobApply::class);
    }
}
