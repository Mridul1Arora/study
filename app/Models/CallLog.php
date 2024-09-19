<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'call_to', 'call_from', 'call_type', 'call_status', 
        'call_start_time', 'time_duration',
        'call_purpose', 'call_agenda', 'call_result', 'description,created_at,updated_at'
    ];
}
