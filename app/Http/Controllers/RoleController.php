<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use App\Http\Requests\RoleRequest;



class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $roles = $this->roleService->getAll();
        return view('Roles.index', compact('roles'));
    }

    public function create()
    {
        return view('Roles.FormCreateRole');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->create($request->validated());
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        $role = $this->roleService->getById($id);
        return view('Roles.FormEditRole', compact('role'));
    }

    public function update(RoleRequest $request, $id)
    {
        $this->roleService->update($id, $request->validated());
        return redirect()->route('role.index');
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
        return redirect()->route('role.index');
    }
}

    
