<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Validator;

class UsersController extends Controller
{
      public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'type' => 'required'
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);
        $request->merge(['status' => 1]);
        $registro = User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Registro creado correctamente');
    }
}
