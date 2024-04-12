<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Http\Requests\PersonRequest;
class PersonController extends Controller
{

  public function __construct(PersonService $personService)
  {
      $this->personService = $personService;
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $persons = $this->personService->getPersonCompany();

        return view('Persons.index',compact('persons'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $companies = $this->personService->getCompany();
        return view('Persons.FormCreatePerson',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        //
       

        try {
            
            $this->personService->create($request->validated());
            return redirect()->route('person.index');
        } catch (\throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(Person $Person)
    // {
    //     //
    //     $Person = $this->personService->getAll();
    //     return view('Persons.FormEditPerson', compact('Person'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $companies = $this->personService->getCompany();
        $person = $this->personService->getById($id);
        return view('Persons.FormEditPerson', compact('person','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request,$id)
    {
        //
        $this->personService->update($id, $request->validated());
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->personService->delete($id);
        return redirect()->route('person.index');
    }
}
