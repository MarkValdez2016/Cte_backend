<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    use HasFactory;
    protected $table = 'educational_backgrounds';

    protected $primaryKey = 'educational_id';

    protected $fillable = [
        'educational_school_name', 'educational_course', 'educational_start_date', 'educational_end_date', 'educational_attainment',
    ];

    protected $timestamp = TRUE;

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
