<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());
      $this->validate($request, [
            'photo' => 'required|image',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'telephone' => 'required',
            'department' => 'required',
            'municipality' => 'required',
        ]);

        $pas = 'secret';
        $request->merge(['password' => bcrypt($pas)]);
        $request->merge(['status' => 1]);
        $path = $request->file('photo')->store('avatars');
        $registro = User::create($request->all());

        
        $path = Storage::putFile('avatars', $request->file('photo'));
      


        //Creacion de Solicitud
        $request->merge(['user_id' => $registro -> id]);
        $request->merge(['password' => $pas]);
        Document::create($request->all());
      


        return redirect()->back()->with('success', 'Registro creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
