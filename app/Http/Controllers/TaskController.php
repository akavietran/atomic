<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\taskService;
use App\Http\Requests\GetPersonByProjectRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\SearchInputRequest;


class TaskController extends Controller
{

  public function __construct(taskService $taskService)
  {
      $this->taskService = $taskService;
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = $this->taskService->getAll();
        $export= $this->taskService->getAllWithRelations();
        return view('Tasks.index',compact('tasks'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects =  $this->taskService->getProject(); 
        return view('tasks.FormCreateTask',compact('projects'));
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        try {
            $success = $this->taskService->create($request->validated());
            if($success){
            return response()->json(['success' => true,'data' => $request->validated()]);
            }
        } catch (\throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    
    public function edit($id)
    {
        //
        $projects = $this->taskService->getProject();
        $task = $this->taskService->getById($id);
        $persons = $this->taskService->getAllPerson();
        return view('Tasks.FormEditTask',compact('task','projects','persons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request,$id)
    {
        //
        $success =   $this->taskService->update($id, $request->validated());
            if($success){
              return response()->json(['success' => true]);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->taskService->delete($id);
        return redirect()->route('task.index');
    }
    public function getPersonsInProject(GetPersonByProjectRequest $request)
    {
      $person = $this->taskService->getPersons($request->project_id);
    
      return response()->json($person);
    }
    public function search(SearchInputRequest $request)
    {
    
        $searchTerm = $request->input('search');

       
        $tasks = $this->taskService->Search($searchTerm);

      
        return view('Tasks.index', compact('tasks'));
    }
    public function exportExcel()
    {
        $tasks = $this->taskService->getAllWithRelations();
        $filePath = $this->taskService->exportTasks($tasks);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
