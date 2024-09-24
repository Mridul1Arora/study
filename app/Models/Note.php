<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['added_by','lead_id','note_text','created_at','updated_at','attachment_id'];

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
            ->log('Created Note');
        });
        

        static::updating(function ($model) {
            $changes = $model->getDirty();
            $leadId = $model->lead_id;

            $fieldsToExclude = ['created_at', 'updated_at'];
    
            $filteredChanges = array_diff_key($changes, array_flip($fieldsToExclude));

            activity()
            ->performedOn($model)
            ->tap(function (ActivityLog $activity) use ($leadId,$filteredChanges) {
                $activity->lead_id = $leadId;
                $activity->updated_fields = $filteredChanges;
                $activity->causer_name = auth()->user()->name;
                $activity->save();
            })
            ->log('Updating Note');
        });

        static::deleting(function ($model) {
            $leadId = $model->lead_id;
            activity()
            ->performedOn($model)
            ->tap(function (ActivityLog $activity) use ($model) {
                $activity->lead_id = $model->lead_id;
                $activity->causer_name = auth()->user()->name;
                $activity->save();
            })
            ->log('Deleting Note');
        });
    }
}
