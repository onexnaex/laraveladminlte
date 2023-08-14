<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use App\DataTables\UsersDataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $data;

    public function __construct()
    {
        $this->data['modul'] ="user";
        $this->data['title'] = "User";
    }

    public function index(UsersDataTable $dataTable)
    {
       // $user = User::all();
       // $this->data['user'] = $user;
        //return view('user.index',$this->data);
        return $dataTable->render('user.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('user.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);

        

      

        User::create($request->all());
        return redirect()->route('user')->with('success','User Create Successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): view
    {
        $this->data['user'] = compact('user');
        return view('user.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): view
    {
        $this->data['user'] = compact('user');
        return view('user.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required||email',
            'password'=>'required'
        ]);
        $user->update($request->all());
        return redirect()->route('user')->with('success','User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        User::find( $id )->delete();
        echo "sukses";
    }
}
