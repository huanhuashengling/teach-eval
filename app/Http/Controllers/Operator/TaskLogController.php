<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\TaskLog;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:task_log list', ['only' => ['index', 'show']]);
        $this->middleware('can:task_log create', ['only' => ['create', 'store']]);
        $this->middleware('can:task_log edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:task_log delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = (new Task)->newQuery();
        $tasks->with("taskLogs.user");

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

        $tasks = $tasks->paginate(10)->onEachSide(2);

        return view('operator.task_log.index', compact('tasks'))
                ->with('i', (request()->input('page', 1) - 1) * 10);


        $taskLogs = (new TaskLog)->newQuery();
        // $taskLogs->select("tasks.name as taskName", "users.name as username");
        $taskLogs->with(["task", "user"]);
        if (request()->has('search')) {
            $taskLogs->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $taskLogs->orderBy($attribute, $sort_order);
        } else {
            $taskLogs->latest();
        }
        $taskLogs = $taskLogs->paginate(10)->onEachSide(2);

        return view('operator.task_log.index', compact('taskLogs'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tasks = Task::all();
        $selectTasksId = "";
        return view('operator.task_log.create', compact('tasks', 'selectTasksId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usersIdList = $request->selected_users_id;
        // dd($usersIdList);
        if (is_array($usersIdList)){
            $request->validate([
                'tasks_id' => ['required', 'string'],
            ]);

            foreach ($usersIdList as $users_id){
                $oldTaskLog = TaskLog::where([
                    'users_id' => $users_id,
                    'tasks_id' => $request->tasks_id,
                    'eval' => "1",
                ])->first();
        // dd($oldTaskLog->id);

                if (isset($oldTaskLog->id)) {
                    continue;
                }

                $oldTaskLog = TaskLog::where([
                    'users_id' => $users_id,
                    'tasks_id' => $request->tasks_id,
                ])->first();

                if (isset($oldTaskLog->id)) {
                    $taskLog->update([
                        'users_id' => $users_id,
                        'tasks_id' => $request->tasks_id,
                        'eval' => '1',
                    ]);
                    continue;
                }

                $taskLog = TaskLog::create([
                    'users_id' => $users_id,
                    'tasks_id' => $request->tasks_id,
                    'eval' => "1",
                ]);
                // dd($taskLog->id);
            }
            return redirect()->route('task_log.index')
                ->with('message','Task Log created successfully.');
        }
        return redirect()->route('task_log.create')
                ->with('message','No Task Log submit.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function show(TaskLog $taskLog)
    {
        return view('operator.task_log.show', compact('taskLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskLog $taskLog)
    {
        $tasks = Task::where(["id" => $taskLog->tasks_id])->get();
        $selectTasksId = $taskLog->tasks_id;
        return view('operator.task_log.edit', compact('tasks', 'selectTasksId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskLog $taskLog)
    {
        $request->validate([
            'users_id' => ['required', 'string'],
            'tasks_id' => ['required', 'string'],
            'eval' => ['required'],
        ]);
        $taskLog->update([
            'users_id' => $request->users_id,
            'tasks_id' => $request->tasks_id,
            'eval' => $request->eval,
        ]);
        return redirect()->route('task_log.index')
                        ->with('message','Task Log updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskLog  $taskLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskLog $taskLog)
    {
        $taskLog->delete();

        return redirect()->route('task_log.index')
                        ->with('message', __('Task Log deleted successfully'));
    }
}
