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
                        ->join('clientes', 'ligacoes.id_cliente','=','clientes.id_cliente')
                        ->select('ligacoes.id_ligacao as id','ligacoes.id_cliente as cod','clientes.nome_cliente as cnome','ligacoes.assunto_ligacao as  assunto')
                        ->where('ligacoes.ativo_ligacao','1')
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
            'created_at' => now(),
            'updated_at' => null,     
        ]);
        // $ligacao = new LigacoesController();
        // $ligacao->montaJson($request);
        return redirect()->route('menuligacoes');
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
        // dd($request->idLigacao);
        DB::table('ligacoes')
            ->where('id_ligacao', $request->idLigacao)
            ->update(['id_cliente' => $request->ADM,
                      'assunto_ligacao' => $request->assunto,
                      'urgencia_ligacao' => $request->Urgencia,
                      'observacoes_ligacao' => $request->observacoes,
                      'iligacaomov_ligacao' => null,
                      'updated_at' => now(),]);
        return redirect()->route('menuligacoes');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ligacoes  $ligacoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ligacoes $ligacoes)
    {
        DB::table('ligacoes')
        ->where('id_ligacao', $request->idLigacao)
        ->update(['ativo_ligacao' => 0,
                  'updated_at' => now(),]);
        // return redirect()->route('menuligacoes');
    }
    public function CadLigacao()
    {
        return view('cadligacao');
    }
    public function carregainfolig($id, Request $request){
        return ligacoes::findOrFail($id);
    }
    public function carregainfocli($id, Request $request){
        return cliente::findOrFail($id);
    }
    public function AltLigacao(){
        return view('altligacao');
    }
    public function montaJson($infoligacao){
        $ticket ='{
            "type"=> 1,
            "subject" => {{$infoligacao->assunto}},
            "category" => "Suporte",
            "urgency": {{$infoligacao->urgencia}},
            "status": "Resolvido",
            "origin": 9,
            "createdDate": now(),
            "originEmailAccount": "gabriel@uniware.com.br",
            "owner": {
            "id": "1607307413",
            "personType": 1,
            "profileType": 1,
            "businessName": "Gabriel Lopes",
            "email": "gabriel@uniware.com.br",
            "phone": "(47) 99999-9999"
            },
             "createdBy": {
            "id": "1607307413",
            "personType": 1,
            "profileType": 2,
            "businessName": "Gabriel Lopes",
            "email": "gabriel@uniware.com.br",
            "phone": "(47) 99999-9999"
            },
            "clients": [
            {
            "id": "00006",
            "personType": 2,
            "profileType": 2,
            "businessName": "00006 - UNIWARE INFORMÁTICA",
            "email": "gabriel@uniware.com.br",
            "phone": "(47) 99999-9999",
            "isDeleted": false,
            }
            ],"actions": [
            {
            "id": 1,
            "type": 2,
            "origin": 9,
            "description": $inforligacao->Assunto,
            "createdDate": now()
            }
            ]
            }';
        $url = 'https://api.movidesk.com/public/v1/tickets';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        
        curl_exec($ch);
        
        $resposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        dd($resposta);
    }
}
