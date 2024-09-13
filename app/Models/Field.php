<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';


    protected $fillable = [
        'field_name',
        'module_id',
        'field_type',
        'status'
    ];

    protected $casts = [
        'status' => 'string'
    ];

}
