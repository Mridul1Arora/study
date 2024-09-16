<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path', 'field_type', 'lead_id', 'file_type','file_name','user_id','file_size'
    ];

    protected $table = 'attachments';
}
