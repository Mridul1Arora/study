<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Lead extends Eloquent
{
    // Define the MongoDB connection and collection name if different from default
    protected $connection = 'mongodb';
    protected $collection = 'leads'; // Optional, defaults to the model name in plural form

    // Specify the attributes that are mass assignable
    protected $fillable = ['name', 'email', 'phone'];

    // Optionally define hidden or cast attributes
    // protected $hidden = ['password'];
    // protected $casts = [
    //     'is_active' => 'boolean',
    // ];
}
