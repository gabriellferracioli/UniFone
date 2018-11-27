<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\User;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('nivelacesso:usuario');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(auth()->user());
        $usuarios = DB::select('select id, Usuario_Usuario as usuario, Nome_Usuario as nome, Ramal_Usuario as ramal from usuarios');
        return view('menuusuario',compact('usuarios'));
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
        $idusuario = DB::select('select id from usuarios order by id desc limit 1');
        $id = $idusuario[0]; 
        // dd($request->cnpj);
        DB::table('usuarios')->insert([
            'id' => intval($id->id) + 1,
            'Nome_usuario'=> $request->nome,
            'Ramal_usuario'=> $request->ramal,
            'Cargo_usuario' => $request->cargo,
            'Usuario_Usuario' => $request->usuario,
            'password'=> Hash::make($request->senha),
            'ativo_usuario' => 1,
            'created_at' => now(),
            'updated_at' => null,     
        ]);
        return redirect()->route('menuusuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        if (Hash::needsRehash($request->senha))
        {
            $senha = Hash::make($request->senha);
        }else {
            $senha = $request->senha;
        }
        
        DB::table('usuarios')
        ->where('id', $request->idusuario)
        ->update(['Nome_Usuario' => $request->nome,
                  'Usuario_Usuario' => $request->usuario,
                  'password' => $senha,
                  'Ramal_Usuario' => $request->ramal,
                  'Cargo_Usuario' => $request->cargo,
                  'updated_at' => now(),]);
    return redirect()->route('menuusuarios');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuarios $usuarios)
    {
        //
    }
    public function cadusuario(){
        return view('cadusuario');
    }
    public function AltUsuario(){
        return view('altusuario');
    }
}
