<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskType;
use App\Models\ParticipantType;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:task list', ['only' => ['index', 'show']]);
        $this->middleware('can:task create', ['only' => ['create', 'store']]);
        $this->middleware('can:task edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:task delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = (new Task)->newQuery();
        $tasks->with(["taskType", "participantType"]);

        if (request()->has('search')) {
            $tasks->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $tasks->orderBy($attribute, $sort_order);
        } else {
            $tasks->latest();
        }

        $tasks->withCount(['taskLogs',
            'taskLogs as task_logs_counta' => function ($query) {
            $query->where('eval', '1');
            },
            'taskLogs as task_logs_countb' => function ($query) {
            $query->where('eval', '0');}]);

        $tasks = $tasks->paginate(10)->onEachSide(2);
        // dd($tasks);
        return view('operator.task.index', compact('tasks'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taskTypes = TaskType::all();
        $participantTypes = ParticipantType::all();
        return view('operator.task.create', compact("taskTypes", "participantTypes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'task_types_id' => ['required', 'string'],
            'participant_types_id' => ['required', 'string', 'max:255'],
            'happen_at' => ['required'],
        ]);
        $task = Task::create([
            'name' => $request->name,
            'participant_types_id' => $request->participant_types_id,
            'task_types_id' => $request->task_types_id,
            'happen_at' => $request->happen_at,
        ]);
        return redirect()->route('task.index')
                        ->with('message','Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('operator.task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $taskTypes = TaskType::all();
        $participantTypes = ParticipantType::all();

        return view('operator.task.edit', compact('task', 'taskTypes', 'participantTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'task_types_id' => ['required', 'string'],
            'participant_types_id' => ['required', 'string', 'max:255'],
            'happen_at' => ['required'],
        ]);
        $task->update([
            'name' => $request->name,
            'participant_types_id' => $request->participant_types_id,
            'task_types_id' => $request->task_types_id,
            'happen_at' => $request->happen_at,
        ]);
        return redirect()->route('task.index')
                        ->with('message','Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('task.index')
                        ->with('message', __('Task deleted successfully'));
    }
}
