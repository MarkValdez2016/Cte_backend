<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'birth_date', 'civil_status',
         'gender', 'religion', 'address', 'zip_code', 'image',
    ];

    protected $timestamp = TRUE;

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
