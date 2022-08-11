<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\ParticipantType;

class Participator extends Component
{
    public $userData;
    public $tasksId;

    protected $listeners = ['getUserData' => 'getUserData', 
                            'closeUserData' => 'closeUserData',
                            'participator:update' => '$refresh',];

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.participator');
    }

    public function getUserData($tasks_id)
    {
        $task = Task::with(["participantType"])->find($tasks_id);
        $conditionStr = $task->participantType->condition;
        $condition = explode(",",$conditionStr);

        $users = (new User)->newQuery();

        foreach ($condition as $conditionSet)
        {
            $conditionItem = explode(":",$conditionSet);
            $users->where([$conditionItem[0] => $conditionItem[1]]);
        }
        $this->tasksId = $tasks_id;
        $this->userData = $users->get();
    }

    public function closeUserData()
    {
        $this->userData = [];
    }

    public function triggerReverseSelect()
    {
        $this->emitTo('person', 'reverseSelect');
    }

    public function triggerAllSelect()
    {
        $this->emitTo('person', 'doSelect');
    }

    public function triggerUnSelect()
    {
        $this->emitTo('person', 'unSelect');
    }
}
