<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tasks_id',
        'users_id',
        'eval',
        'created_at',
        'updated_at',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'tasks_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
