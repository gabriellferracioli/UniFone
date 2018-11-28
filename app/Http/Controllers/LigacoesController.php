<?php

namespace App\Http\Controllers;

use App\cliente;
use App\ligacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

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
        $idMovidesk=0;
        $ligacao = new LigacoesController();
        if($ligacao->validaenvio()){
        $idMovidesk = $ligacao->EnviaMovidesk($request);
        }
        $idligacao = DB::select('select id_ligacao from ligacoes order by id_ligacao desc limit 1');
        $id = $idligacao[0]; 
        DB::table('ligacoes')->insert([
            'id_ligacao' => intval($id->id_ligacao) + 1,
            'id_cliente' => $request->ADM,
            'id_usuario' => auth()->user()->id,
            'assunto_ligacao' => $request->assunto,
            'urgencia_ligacao' => $request->Urgencia,
            'observacoes_ligacao' => $request->observacoes,
            'iligacaomov_ligacao' => $idMovidesk,
            'ativo_ligacao' => 1,
            'created_at' => now(),
            'updated_at' => null,     
        ]);
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
        $ligacao = new LigacoesController();
        if($ligacao->validaenvio()){
        $ligacao->AlteraMovidesk($request);
        }
        DB::table('ligacoes')
            ->where('id_ligacao', $request->idLigacao)
            ->update(['id_cliente' => $request->ADM,
                      'assunto_ligacao' => $request->assunto,
                      'urgencia_ligacao' => $request->Urgencia,
                      'observacoes_ligacao' => $request->observacoes,
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
    public function carregainfousu($id, Request $request){
        return User::findOrFail($id);
    }
    public function AltLigacao(){
        return view('altligacao');
    }
    public function EnviaMovidesk($infoligacao){
        // dd($infoligacao);
        date_default_timezone_set('America/Sao_Paulo');
        $ticket = array(
            'type' => '1',
         'subject' => $infoligacao->assunto,
        'category' => 'Suporte',
         'urgency' => '3) Normal',
          'status' => 'Resolvido',
          'origin' => '9',
     'createdDate' => substr(now(),0),
           'owner' => array(
                     'id' => auth()->user()->Idmovidesk_Usuario 
           ),
       'ownerTeam' => 'Desenvolvimento',
       'createdBy' => array(
                     'id' => auth()->user()->Idmovidesk_Usuario
           ), 
         'clients' =>array(array(
                     'id' => $infoligacao->ADM,
             'personType' => '2',
            'profileType' => '2'
           )),
         'Actions' =>array(array(
                   'type' => '1' ,
            'description' => $infoligacao->observacoes,
                 'origin' => '9',
              'createdBy' => array(
                'id' => auth()->user()->Idmovidesk_Usuario
              ),
           )),
        );

        $ticketjson = json_encode($ticket);
        // dd($ticketjson);

        $url = 'https://api.movidesk.com/public/v1/tickets?token=ebd6e959-a91e-4d65-88fe-bdea14a87eca';
        
        $ch = curl_init($url);

        // curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, 1);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ticketjson);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
         $resposta = curl_exec($ch);
         $resposta = preg_replace("/[^0-9]/", "", $resposta);
         return $resposta;
        // $resposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }

    public function AlteraMovidesk($infoligacao){
        $select  = DB::select('select IligacaoMov_Ligacao from ligacoes where id_Ligacao ='.$infoligacao->idLigacao);
        $id = $select[0];
        date_default_timezone_set('America/Sao_Paulo');
        $ticket = array(
         'subject' => $infoligacao->assunto,
         'clients' =>array(array(
                     'id' => $infoligacao->ADM,
             'personType' => '2',
            'profileType' => '2'
           )),
         'Actions' =>array(array(
                   'type' => '1' ,
            'description' => $infoligacao->observacoes,
                 'origin' => '9',
              'createdBy' => array(
                'id' => auth()->user()->Idmovidesk_Usuario
              ),
           )),
        );
        $ticketjson = json_encode($ticket);

        $url = 'https://api.movidesk.com/public/v1/tickets?token=ebd6e959-a91e-4d65-88fe-bdea14a87eca&id='.$id->IligacaoMov_Ligacao;
        
        $ch = curl_init($url);

        // curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ticketjson);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

        $resposta = curl_exec($ch);
        // $resposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    }
    public function validaenvio(){
        if ((auth()->user()->Idmovidesk_Usuario <> null) or (auth()->user()->Time_Usuarios <> null)
             or (auth()->user()->Idmovidesk_Usuario <> '') or (auth()->user()->Time_Usuarios <> '')) {
                return true;
        } else {
                return false;
        }
    }
}
