<?php

namespace App\Http\Controllers;

use App\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('nivelacesso:cliente');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::select('select id_cliente as cod, nome_cliente as nome, municipio_cliente as municipio, telefone1_cliente as telefone from clientes');
        return view('menucliente',compact('clientes'));
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
        $idcliente = DB::select('select id_cliente from clientes order by id_cliente desc limit 1');
        $id = $idcliente[0]; 
        DB::table('clientes')->insert([
            'id_cliente' =>  intval($id->id_cliente) + 1,
            'CNPJ_cliente'=> $request->cnpj,
            'Nome_cliente'=> $request->nome,
            'Razaosocial_cliente' => $request->razaosocial,
            'Municipio_cliente' => $request->municipio,
            'Estado_cliente'=> $request->estados,
            'Telefone1_cliente'=> $request->telefone1,
            'Telefone2_cliente'=> $request->telefone2,
            'ativo_cliente' => 1,
            'created_at' => now(),
            'updated_at' => null,     
        ]);
        return redirect()->route('menuclientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        DB::table('clientes')
        ->where('id_cliente', $request->idcliente)
        ->update(['Nome_cliente' => $request->nome,
                  'CNPJ_cliente' => $request->cnpj,
                  'Razaosocial_cliente' => $request->razaosocial,
                  'Municipio_cliente'   => $request->municipio,
                  'Estado_cliente'      => $request->estados,
                  'Telefone1_cliente'   => $request->telefone1,  
                  'Telefone2_cliente'   => $request->telefone2,  
                  'updated_at' => now(),]);
        return redirect()->route('menuclientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
    public function cadcliente()
    {
        return view('cadcliente');
    }
    public function altcliente()
    {
        return view('altcliente');
    }
    
}
