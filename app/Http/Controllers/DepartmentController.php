<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DepartmentService;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function getViewParams($action, $id = null)
    {
        switch ($action) {
            case 'index':
                $departments = $this->departmentService->getAll();
                $parent_id = null;
                foreach ($departments as $department) {
                    if ($department->parent) {
                        $parent_id = $department->parent->id;
                        break;
                    }
                }

                return compact('departments', 'parent_id');
        }
    }
    public function index()
    {

       
            $departments = $this->departmentService->getAll();
            return view('Departments.index', compact('departments'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = $this->departmentService->getCompany();
        $parents = $this->departmentService->getParent();
        $departments = $this->departmentService->getDepartment();
        return view('Departments.FormCreateDepartment', compact('companies', 'parents','departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        try {
            $this->departmentService->create($request->validated());
            return redirect('/company');
        } catch (\throwable $e) {
            return redirect('/company')
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $companies = $this->departmentService->getCompany();
        $department = $this->departmentService->getById($id);
        $departments = $this->departmentService->getDepartment();
        return view('Departments.FormEditDepartment', compact('department', 'companies','departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, $id)
    {
        //
        $this->departmentService->update($id, $request->validated());
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->departmentService->delete($id);
        return redirect('/company?department=1');
    }
}
