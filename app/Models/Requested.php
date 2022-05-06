<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requested extends Model
{
    use HasFactory;

    protected $table = 'requesteds';

    protected $primaryKey = 'request_id';

    protected $fillable = [
        'request_details', 'request_image', 'status_id', 
    ];

    protected $timestamp = TRUE;

}
