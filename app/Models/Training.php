<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';

    protected $primaryKey = 'training_id';

    protected $fillable = [
        'training_name', 'training_date_start', 'training_date_end', 'number_of_hours', 'training_type', 'training_conducted_by', 
    ];

    protected $timestamp = TRUE;
}
