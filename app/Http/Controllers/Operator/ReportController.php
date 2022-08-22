<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskLog;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;
use Config;

class ReportController extends Controller
{
    private $tasks;
    private $usersData;
    public function __construct()
    {
        $this->middleware('can:task list', ['only' => ['index', 'show']]);
        $this->middleware('can:task create', ['only' => ['create', 'store']]);
        $this->middleware('can:task edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:task delete', ['only' => ['destroy']]);
        // $this->usersData = [];
        // $this->tasks = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $participantTypesId = isset($request->participantTypesId)?$request->participantTypesId:1;
        $startDate = isset($request->startDate)?$request->startDate:"";
        $endDate = isset($request->endDate)?$request->endDate:"";;
        
        // echo $participantTypesId . "  " . $startDate . "  " . $endDate;

        $from = date('Y-m-d H:i', strtotime($startDate." 00:00:00"));
        $to = date('Y-m-d H:i', strtotime($endDate." 23:59:00"));

        $tasks = (new Task)->newQuery();
        $tasks->with(["taskType", "participantType"]);

        if (request()->has('search')) {
            $tasks->where('name', 'Like', '%'.request()->input('search').'%');
        }

        $tasks->where("participant_types_id", "=", $participantTypesId);
        // $tasks->whereBetween("happen_at", [$from, $to]);
        if ($request->startDate && $request->endDate) {
            $tasks->whereDate('happen_at', '<=', $to);
            $tasks->whereDate('happen_at', '>=', $from);
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
        $tasks= $tasks->get();
        // var_dump($tasks);

        $usersData = [];

        $users = (new User)->newQuery();
        $users->with("taskLogs");
        if(1 == $participantTypesId) {
            $users->where('is_working', '=', '1');
        } else if(2 == $participantTypesId) {
            $users->where('is_working', '=', '1');
            $users->where('is_member', '=', '1');
        }
        $users = $users->get();
        foreach ($users as $k => $user) {
            $count = 0;
            $taskLogs = [];
            foreach ($tasks as $m => $task) {
                $taskLog = TaskLog::where("tasks_id", "=", $task->id)
                                    ->where("users_id", "=", $user->id)->first();
                if(isset($taskLog)) {
                    array_push($taskLogs, $taskLog);
                    $count += $taskLog->eval;
                } else {
                    array_push($taskLogs, (object)["eval" => 0]);
                }
            }
            array_push($usersData, (object)["user" => $user, 'taskLogs' => $taskLogs, 'count' => $count]);
        }

        $this->usersData = $usersData;
        $this->tasks = $tasks;
        // echo "hhjhj";
        // dd($tasks);
        // return Excel::download(new ReportExport($tasks, $usersData), 'tasks.csv');
        // Config::set('tasks', $tasks);
        // Config::set('usersData', $usersData);
        return view('operator.report.index', compact('tasks', 'usersData', 'participantTypesId', 'startDate', 'endDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {

    }

    public function export(Request $request) 
    {
        echo $request->participantTypesId;
        // $tasks = Config::get('tasks');
        // echo "asasas";
        // dd($tasks);

        // dd($this->participantTypesId);
        dd($this->tasks);
        return Excel::download(new ReportExport($this->tasks, $this->usersData), 'tasks.csv');
    }
}
