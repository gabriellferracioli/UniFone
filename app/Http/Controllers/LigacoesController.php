<?php

namespace App\Http\Controllers;

use App\ligacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LigacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligacoes = DB::table('ligacoes')
                        -> join('clientes', 'ligacoes.id_cliente','=','clientes.id_cliente')
                        ->select('ligacoes.id_cliente as nligacoes','ligacoes.id_cliente as cod','clientes.nome_cliente as cnome','ligacoes.assunto_ligacao as  assunto')
                        ->orderBy('ligacoes.id_cliente','desc')
                        ->get();
        return view('menuligacao', compact('ligacoes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ligacoes  $ligacoes
     * @return \Illuminate\Http\Response
     */
    public function show(ligacoes $ligacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ligacoes  $ligacoes
     * @return \Illuminate\Http\Response
     */
    public function edit(ligacoes $ligacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ligacoes  $ligacoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ligacoes $ligacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ligacoes  $ligacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ligacoes $ligacoes)
    {
        //
    }
    public function CadLigacao()
    {
        return view('cadligacao');
    }
}
