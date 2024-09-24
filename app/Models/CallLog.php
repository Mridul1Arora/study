<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityLog;

class CallLog extends Model
{
    use HasFactory;

    protected static $logAttributes = ['call_to', 'call_from']; 

    protected static $logName = 'call_log_model_log';

    protected $fillable = [
        'call_to', 'call_from', 'call_type', 'call_status', 
        'call_start_time', 'time_duration','lead_id',
        'call_purpose', 'call_agenda', 'call_result', 'description', 'created_at', 'updated_at'
    ];


    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            activity()
            ->performedOn($model)
            ->tap(function (ActivityLog $activity) use ($model) {
                $activity->lead_id = $model->lead_id;
                $activity->causer_name = auth()->user()->name;
                $activity->save();
            })
            ->log('Created call log');
        });
        

        static::updating(function ($model) {
            $changes = $model->getDirty();
            $leadId = $model->lead_id;

            $fieldsToExclude = ['created_at', 'updated_at', 'id' , 'lead_id'];
    
            $filteredChanges = array_diff_key($changes, array_flip($fieldsToExclude));

            activity()
            ->performedOn($model)
            ->tap(function (ActivityLog $activity) use ($leadId,$filteredChanges) {
                $activity->lead_id = $leadId;
                $activity->updated_fields = $filteredChanges;
                $activity->causer_name = auth()->user()->name;
                $activity->save();
            })
            ->log('Updating call log');
        });
    }
}
