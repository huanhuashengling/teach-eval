<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'happen_at',
        'task_types_id',
        'participant_types_id',
        'created_at',
        'updated_at',
    ];

    public function taskLogs()
    {
        return $this->hasMany(TaskLog::class, 'tasks_id', 'id');
    }

    public function taskType()
    {
        return $this->belongsTo(TaskType::class, 'task_types_id');
    }

    public function participantType()
    {
        return $this->belongsTo(ParticipantType::class, 'participant_types_id');
    }
}
