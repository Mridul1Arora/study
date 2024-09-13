<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cd_id', 'country_id', 'state_id','college_id','campus_location','city_id','city_2','desc','university_owner','modified_by'
    ];

    protected $table = 'universities';
}
