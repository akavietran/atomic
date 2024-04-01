<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{

  public function __construct(UserService $userService)
  {
      $this->userService = $userService;
  }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = $this->userService->getAll();
        return view('Users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=$this->userService->GetRole();
        return view('Users.FormCreateUser',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
       

        try {
            $this->userService->create($request->validated());
            return redirect()->route('user.index');
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
    //     $user = $this->userService->getAll();
    //     return view('Users.FormEditUser', compact('user'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $roles=$this->userService->GetRole();
        $user = $this->userService->getById($id);
        return view('Users.FormEditUser', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request,$id)
    {
        //
        $this->userService->update($id, $request->validated());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->userService->delete($id);
        return redirect()->route('user.index');
    }
}
