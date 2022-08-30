<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function index()
    {
        $users = Users::all();

        return view('users.index', compact('users'));
    }



    public function create()
    {
        $users = Users::all();

        return view('users.create', compact('users'));
    }

    public function store(Request $request, Users $users)
    {

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;

        $isSaved = $users->save();
    }

    public function show(Users $users, $id)
    {
        $users = $users->find($id);
        return view('users.show', compact('users'));
    }


    public function edit(Users $users, $id)
    {
        //
        $users = $users->find($id);
        return view('users.edit', compact('users'));
    }


    public function update(Request $request, $id)
    {

        $users = new Users;
        $isUpdated = $users->where("id", $id)->update(array('name' => $request->name, 'email' => $request->email, 'password' => $request->password,));
        if ($isUpdated) {
        }
    }



    public function destroy(Users $users, $id)
    {
        //
        $isDeleted = $users->where("id", $id)->delete();
        if ($isDeleted) {
        }
    }
}
