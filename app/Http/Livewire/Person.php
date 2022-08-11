<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\TaskLog;

class Person extends Component
{
    public $user;
    public $tasksId;
    public $checkedValue;

    protected $listeners = ['reverseSelect' => 'reverseSelect', 
                            'unSelect' => 'unSelect',
                            'doSelect' => 'doSelect',];

    public function mount($user, $tasksId)
    {
        $this->user = $user;
        $this->tasksId = $tasksId;

        $oldTaskLog = TaskLog::where([
            'users_id' => $this->user->id,
            'tasks_id' => $this->tasksId,
        ])->first();
        // dd($this->tasksId . "   " . $oldTaskLog->id);

        if (isset($oldTaskLog->id)) {
            if("1" == $oldTaskLog->eval) {
                $this->checkedValue = $this->user->id;
            } else {
                $this->checkedValue = false;
            }
        }
    }

    public function render()
    {
        return view('livewire.person');
    }

    public function reverseSelect()
    {
        if($this->user->id == $this->checkedValue) {
            $this->checkedValue = false;
        } else {
            $this->checkedValue = $this->user->id;
        }

        $this->updateSelectStatus();
    }
    
    public function unSelect()
    {
        $this->checkedValue = false;
        $this->updateSelectStatus();
    }

    public function doSelect()
    {
        $this->checkedValue = $this->user->id;
        $this->updateSelectStatus();
    }

    public function updateSelectStatus()
    {
        if($this->user->id == $this->checkedValue) {
            $eval = "1";
        } else {
            $eval = "0";
        }
        $oldTaskLog = TaskLog::where([
            'users_id' => $this->user->id,
            'tasks_id' => $this->tasksId,
            'eval' => $eval,
        ])->first();

        if (isset($oldTaskLog->id)) {
            return;
        }

        $oldTaskLog = TaskLog::where([
            'users_id' => $this->user->id,
            'tasks_id' => $this->tasksId,
        ])->first();

        if (isset($oldTaskLog->id)) {
            $oldTaskLog->update([
                'eval' => $eval,
            ]);
            return;
        }

        $taskLog = TaskLog::create([
            'users_id' => $this->user->id,
            'tasks_id' => $this->tasksId,
            'eval' => $eval,
        ]);

        // dd($taskLog->id);

        // $task = Task::with(["participantType"])->find($tasks_id);
        // $conditionStr = $task->participantType->condition;
        // $condition = explode(",",$conditionStr);

        // $users = (new User)->newQuery();

        // foreach ($condition as $conditionSet)
        // {
        //     $conditionItem = explode(":",$conditionSet);
        //     $users->where([$conditionItem[0] => $conditionItem[1]]);
        // }

        // $this->userData = $users->get();
    }

}
