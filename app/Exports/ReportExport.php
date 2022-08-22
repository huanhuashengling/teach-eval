<?php
namespace App\Exports;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
	public function __construct($tasks, $usersData) {
	    $this->tasks = $tasks;
	    $this->usersData = $usersData;
	}

    public function view(): View
    {

    	$tasks = $this->tasks;
    	$usersData = $this->usersData;
        return view('operator.exports.report', compact('tasks', 'usersData'));
    }
}