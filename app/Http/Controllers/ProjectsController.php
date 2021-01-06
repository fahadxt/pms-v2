<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;
use Illuminate\Support\Facades\Storage;
use Sopamo\LaravelFilepond\Filepond;

class ProjectsController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function index()
    // {
    //     return view('projects.index');
    // }

    // public function upload(Request $request)
    // {
    // 	$file = $request->file('files');
    // 	return $file->store('images');
    // }

    // public function store(Request $request){
    //     $data = new projects(request()->all());
    //     $data->owner_id = auth()->user()->id;
    //     $data->save();
    //     return redirect()->back();
    // }
}
