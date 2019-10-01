<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $all = User::orderBy('created_at')->paginate(20);
        return view('admin.user.index')->with('users', $all);
    }

    public function create() {
        return view('admin.user.create');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.user.edit')->with('user', $user);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'require',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->back();
    }
    
    public function show() {
        return view('admin.user.show');
    }

    public function update(Request $request, $id) {

    }

    public function delete($id) {
        $user = User::find($id);
        $user->forceDelete();

        return redirect()->back();
    }
}
