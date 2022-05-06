<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $primaryKey = 'schedule_id';

    protected $fillable = [
        'schedule_class_name', 'schedule_day', 'schedule_start_time', 'schedule_end_time',
    ];

    protected $timestamp = TRUE;    
}
