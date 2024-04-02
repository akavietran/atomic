<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\AtomicService;
use App\Http\Requests\AtomicTestRequest;
class AtomicController extends Controller
{

  public function __construct(AtomicService $atomicService)
  {
      $this->atomicService = $atomicService;
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $atomics=  $this->atomicService->getAll();
        return view('Atomics.index',compact('atomics'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        return view('Atomics.FormCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AtomicTestRequest $request)
    {
        //
       

        try {
            
            $success =  $this->atomicService->create($request->validated());
            if($success){
                return redirect()->route('atomic.index');
            }
        } catch (\throwable $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     //
    //     $user = $this->atomicService->getAll();
    //     return view('Users.FormEditUser', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $atomics = $this->atomicService->getById($id);
        return view('Atomics.FormUpdate', compact('atomics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AtomicTestRequest $request, $id)
    {
        //
        $this->atomicService->update($id, $request->validated());
        return redirect()->route('atomic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->atomicService->delete($id);
        return redirect()->route('atomic.index');
    }
}
