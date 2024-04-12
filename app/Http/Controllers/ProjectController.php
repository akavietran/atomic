<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\GetPersonRequest;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $pagination = $this->projectService->getPersonCompany();
        return view('Projects.index', [
        'projects' => $pagination->items(),
        'pagination' => $pagination,
       ]);
    }
    
    public function getPersons(GetPersonRequest $request)
{
    $person = $this->projectService->getPersons($request->company_id);
    
    return response()->json($person);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->projectService->getCompany();

        return view('Projects.FormCreateProject', compact('companies'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        try {
            $success = $this->projectService->create($request->validated());
            if ($success) {
                return redirect()->route("project.index");
            }
        } catch (\Exception $th) {
            return back()->withError($th->getMessage())->withInput();
        }
    }

    
    public function edit($id)
    {
        //
        $project= $this->projectService->getById($id);   
        $persons = $project->company->person;
        $companies = $this->projectService->getCompany();
        return view('Projects.FormEditProject', compact('project','companies','persons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, $id)
    {
        $success = $this->projectService->update($id, $request->validated());
        if ($success) {
            return response()->json(['success' => true,'data' => $request->validated()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->projectService->delete($id);
        return redirect()->route('project.index');
    }
}
