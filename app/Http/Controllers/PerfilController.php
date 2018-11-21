<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PerfilController extends Controller
{
    public function perfil(){
        $usuario = DB::select('select id, nome_usuario  as nome, Usuario_Usuario as usuario, password as senha, Ramal_Usuario as ramal from usuarios where id ='.auth()->user()->id);
        $usuario = $usuario[0];
        return view('perfil', compact('usuario'));
    }
    public function alterarper(Request $request, Usuarios $usuarios)
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
                  'updated_at' => now(),]);
    return redirect()->route('home');
    }
}
