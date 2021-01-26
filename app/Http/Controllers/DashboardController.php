<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tasks;

class DashboardController extends Controller
{
    public function tasks()
    {
        $data = \DB::table('tasks')
        ->join('statuses', 'statuses.id', '=', 'tasks.status_id')
        ->select('status_id', 'statuses.display_name as key' , \DB::raw('count(*) as value'))
        ->groupBy('status_id', 'statuses.display_name')
        ->orderBy('value', 'desc')
        ->get()->toArray();

        return json_encode($data);
    }
    public function top_5_users()
    {
        $data = \DB::table('tasks')->where('status_id' , 4)
        ->join('users', 'users.id', '=', 'tasks.assigned_to')
        ->select('assigned_to', 'users.name' , \DB::raw('count(*) as value'))
        ->groupBy('assigned_to', 'users.name')
        ->orderBy('value', 'desc')
        ->take(5)->toArray();

        return json_encode($data);
    }

    public function index()
    {
        return view('dashboard.index');
    }
}
