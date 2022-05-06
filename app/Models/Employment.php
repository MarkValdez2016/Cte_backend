<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;
    protected $table = 'employments';

    protected $primaryKey = 'employment_id';

    protected $fillable = [
        'employment_WMSU_id', 'employment_PRC_id', 'employment_department', 'employment_position', 'employment_date',
    ];

    protected $timestamp = TRUE;

    
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}

