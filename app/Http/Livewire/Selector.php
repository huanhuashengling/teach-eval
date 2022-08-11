<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\ParticipantType;

class Selector extends Component
{
    public $dataset;
    public $selectTasksId;

    public function mount($dataset, $selectTasksId)
    {
        $this->dataset = $dataset;
        $this->selectTasksId = "";
        // TODO: When EDIT the participator won't call listener fun getUserData.
        // $this->selectTasksId = $selectTasksId;
        // $this->updatedSelectTasksId($this->selectTasksId);
    }

    public function render()
    {
        return view('livewire.selector');
    }

    public function updated($name, $value)
    {
        // $this->emit('participator:update');
        // $this->updatedSelectTasksId($this->selectTasksId);
    }

    public function updatedSelectTasksId($tasks_id)
    {
        if("" == $tasks_id) {
            $this->emitTo('participator', 'closeUserData');
        } else {
            $this->emitTo('participator', 'getUserData', $tasks_id);
        }
    }
}
