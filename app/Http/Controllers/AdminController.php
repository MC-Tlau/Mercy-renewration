<?php

namespace App\Http\Controllers;
use App\Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');

    }
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.index')->with ('users', $users);
    }

    

    public function edit($id)
    {
        $user = User::find($id);
       return view('admin.edit')->with('user', $user);
    }

    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->role = request('role');
        $user->save();

        return redirect('/admin');
        
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}
