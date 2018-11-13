<?php

namespace App\Http\Controllers;

use App\cliente;
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
                        ->orderBy('ligacoes.id_ligacao','desc')
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
        $idligacao = DB::select('select id_ligacao from ligacoes order by id_ligacao desc limit 1');
        $id = $idligacao[0]; 
        DB::table('ligacoes')->insert([
            'id_ligacao' => intval($id->id_ligacao) + 1,
            'id_cliente' => $request->ADM,
            'id_usuario' => auth()->user()->id,
            'assunto_ligacao' => $request->assunto,
            'urgencia_ligacao' => $request->Urgencia,
            'observacoes_ligacao' => $request->observacoes,
            'iligacaomov_ligacao' => null,
            'ativo_ligacao' => 1,
            'created_at' => null,
            'updated_at' => null,     
        ]);
        return redirect()->route('menuligacoes')->with('message', 'Ligação cadastrada com sucesso!');
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
    public function carregainfolig($id, Request $request)
    {   
        //return Cliente::findOrFail($id);
        dd($id);
        return view('cadligacao');
        //Ligacoes::findOrFail($id);
    }
}
