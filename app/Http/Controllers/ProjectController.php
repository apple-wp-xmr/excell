<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ImportStoreRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Jobs\ImportProjectExcellFileJob;
use App\Models\File;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(10);
        $projects = ProjectResource::collection($projects);

        return inertia('Project/Index', compact('projects'));
    }
    public function import(){
        return inertia('Project/Import');    
    }
    public function store(ImportStoreRequest $request){
        $data = $request->validated();
        $file = File::putAndCreate($data);

        $task = Task::create([
            'file_id' => $file->id,
            'user_id' => auth()->id(),
            'type' => $data['type']
        ]);

        ImportProjectExcellFileJob::dispatchNow($file->path, $task);
    }
}
