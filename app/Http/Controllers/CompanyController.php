<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Services\CompanyService;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $companies = $this->companyService->getAll();
            return view('Companys.index', compact('companies'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Companys.FormCreateCompany');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        //

        try {
            $this->companyService->create($request->validated());
            return redirect()->route('company.index');
        } catch (\throwable $e) {
            return back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $company = $this->companyService->getById($id);
        return view('Companys.FormEditCompany', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, $id)
    {
        //
        $this->companyService->update($id, $request->validated());
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->companyService->delete($id);
        return redirect()->route('company.index');
    }
}
