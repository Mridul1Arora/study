<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class lead extends Model
{
    use HasFactory;
    use HasRoles;


    protected $primaryKey = 'lead_id';

    protected $guarded = [];
}
